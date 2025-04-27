<?php

namespace App\Http\Controllers\backend;

use App\Models\Committee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::orderBy('id', 'asc')->get();
        return view('admin.main.committee.index', compact('committees'));
    }


    public function create()
    {
        return view('admin.main.committee.create');
    }


    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'nullable|string|max:99',
                'phone' => 'required|string|max:15|unique:event_registers,phone',
                'email' => 'nullable|email|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'blood_group' => 'nullable|string|max:5',
                'other_info' => 'nullable|string',
            ]);

            $committee = new Committee();
            $committee->name = $request->name;
            $committee->position = $request->position;
            $committee->phone = $request->phone;
            $committee->email = $request->email;
            $committee->blood_group = $request->blood_group;
            if ($request->hasFile('photo')) {
                $committee->photo = $request->file('photo')->store('committees', 'public');
            }
            $committee->save();

            return redirect()->route('committee.list')->with('success', 'কমিটির সদস্য যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $committee = Committee::find($id);
        return view('admin.main.committee.edit', compact('committee'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'nullable|string|max:99',
                'phone' => 'required|string|max:15|unique:event_registers,phone',
                'email' => 'nullable|email|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'blood_group' => 'nullable|string|max:5',
                'other_info' => 'nullable|string',
            ]);

            $committee = Committee::findOrFail($id);

            $committee->name = $request->input('name');
            $committee->position = $request->input('position');
            $committee->phone = $request->input('phone');
            $committee->email = $request->input('email');
            $committee->blood_group = $request->input('blood_group');
            if ($request->hasFile('photo')) {
                if ($committee->photo) {
                    Storage::delete('public/' . $committee->photo);
                }

                $committee->photo = $request->file('photo')->store('committees', 'public');
            }

            $committee->save();

            return redirect()->route('committee.list')->with('success', 'কমিটির তথ্য আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $committee = Committee::findOrFail($id);
        return view('admin.main.committee.show', compact('committee'));

    }

    public function destroy($id)
    {
        $committee = Committee::find($id);
        // Delete the image if it exists
        if ($committee->image) {
            Storage::disk('public')->delete($committee->image);
        }
        $committee->delete();

        return redirect()->route('committee.list')->with('success', 'কমিটির তথ্য ডিলিট করা হয়েছে!');
    }

    public function allCommittee()
    {
        $committees = Committee::orderBy('id', 'asc')->paginate(10);

        return view('frontend.main.committee', compact('committees'));
    }

}
