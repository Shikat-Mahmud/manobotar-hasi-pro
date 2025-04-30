<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-project', 'edit-project', 'show-project', 'delete-project',])) {
            $projects = Project::all();

            $projects->each(function ($project) {
                $project->shortDescription = Str::words(strip_tags($project->description), 10, '...');
            });

            return view('admin.main.project.index', compact('projects'));
        } else {
            return redirect()->back()->with('error', 'আপনার প্রজেক্ট দেখার অনুমতি নেই।');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('create-project')) {
            return view('admin.main.project.create');
        } else {
            return redirect()->back()->with('error', 'আপনার প্রজেক্ট তৈরি করার অনুমতি নেই।');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'slogan' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'project_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $project = new Project();
            $project->name = $request->name;
            $project->slogan = $request->slogan;

            if ($request->hasFile('image')) {
                $project->image = $request->file('image')->store('projects', 'public');
            }

            if ($request->hasFile('project_photos')) {
                $photos = [];
                foreach ($request->file('project_photos') as $file) {
                    $photos[] = $file->store('projects', 'public');
                }
                $project->project_photos = $photos;
            }

            $project->description = $request->description;
            $project->save();

            return redirect()->route('projects')->with('success', 'প্রজেক্ট সফলভাবে তৈরি হয়েছে।');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->back()->with('error', 'প্রজেক্ট পাওয়া যায়নি।');
        }

        if (auth()->user()->can('show-project')) {
            return view('admin.main.project.show', compact('project'));
        } else {
            return redirect()->back()->with('error', 'আপনার প্রজেক্ট দেখার অনুমতি নেই।');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if (auth()->user()->can('edit-project')) {
            $project = Project::find($id);
            return view('admin.main.project.edit', compact('project'));
        } else {
            return redirect()->back()->with('error', 'আপনার প্রজেক্ট এডিট করার অনুমতি নেই।');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {
            $project = Project::find($id);
            if (!$project) {
                return redirect()->back()->with('error', 'প্রজেক্ট পাওয়া যায়নি।');
            }

            $request->validate([
                'name' => 'required|string|max:255',
                'slogan' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'project_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $project->name = $request->name;
            $project->slogan = $request->slogan;

            // Update logo image if new one is uploaded
            if ($request->hasFile('image')) {
                $project->image = $request->file('image')->store('projects', 'public');
            }

            // Handle multiple photos
            $existingPhotos = is_array($project->project_photos) ? $project->project_photos : [];

            if ($request->hasFile('project_photos')) {
                foreach ($request->file('project_photos') as $photo) {
                    $path = $photo->store('projects', 'public');
                    $existingPhotos[] = $path;
                }
            }

            $project->project_photos = $existingPhotos;
            $project->description = $request->description;
            $project->save();

            return redirect()->route('projects')->with('success', 'প্রজেক্ট সফলভাবে আপডেট হয়েছে।');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'ত্রুটি ঘটেছে: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (auth()->user()->can('delete-project')) {
            $project = Project::find($id);

            if ($project) {
                // Delete the image if it exists
                if ($project->image) {
                    Storage::delete('public/' . $project->image);
                }

                $project->delete();
                return redirect()->route('projects')->with('success', 'প্রজেক্ট সফলভাবে মুছে ফেলা হয়েছে।');
            } else {
                return redirect()->back()->with('error', 'প্রজেক্ট পাওয়া যায়নি।');
            }
        } else {
            return redirect()->back()->with('error', 'আপনার প্রজেক্ট মুছে ফেলার অনুমতি নেই।');
        }
    }

    public function changeStatus(int $id)
    {
        try {
            $project = Project::find($id);
            if (!$project) {
                return redirect()->back()->with('error', 'প্রজেক্ট পাওয়া যায়নি।');
            }

            $project->status = $project->status == 1 ? 0 : 1;
            $project->save();

            return redirect()->back()->with('success', 'প্রজেক্টের স্ট্যাটাস সফলভাবে পরিবর্তন হয়েছে।');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function deletePhoto(Project $project, $index)
    {
        try {
            $photos = $project->project_photos; // already an array due to model cast

            if (isset($photos[$index])) {
                // Delete file from storage
                Storage::disk('public')->delete($photos[$index]);

                // Remove the photo from the array
                array_splice($photos, $index, 1);
                $project->project_photos = $photos;
                $project->save();

                return redirect()->back()->with('success', 'ছবি সফলভাবে মুছে ফেলা হয়েছে।');
            }

            return redirect()->back()->with('error', 'ছবি খুঁজে পাওয়া যায়নি।');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'ত্রুটি ঘটেছে: ' . $e->getMessage());
        }
    }

    public function projectDetail($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->back()->with('error', 'প্রজেক্ট পাওয়া যায়নি।');
        }

        $otherProjects = Project::whereNot('id', $project->id)->get();
        return view('frontend.main.project_detail', compact('project', 'otherProjects'));
    }
}
