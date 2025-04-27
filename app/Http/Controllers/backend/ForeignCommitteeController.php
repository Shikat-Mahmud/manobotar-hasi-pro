<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\ForeignCommittee;

class ForeignCommitteeController extends Controller
{
    public function index()
    {
        $committees = ForeignCommittee::orderBy('id', 'asc')->get();
        return view('admin.main.foreign_committee.index', compact('committees'));
    }


    public function create()
    {
        return view('admin.main.foreign_committee.create');
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

            $adviser = new ForeignCommittee();
            $adviser->name = $request->name;
            $adviser->position = $request->position;
            $adviser->phone = $request->phone;
            $adviser->email = $request->email;
            $adviser->blood_group = $request->blood_group;
            if ($request->hasFile('photo')) {
                $adviser->photo = $request->file('photo')->store('foreign_committees', 'public');
            }
            $adviser->save();

            return redirect()->route('foreign.list')->with('success', 'কমিটির সদস্য যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    
    public function edit(string $id)
    {
        $committee = ForeignCommittee::find($id);
        return view('admin.main.foreign_committee.edit', compact('committee'));
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

            $adviser = ForeignCommittee::findOrFail($id);

            $adviser->name = $request->input('name');
            $adviser->position = $request->input('position');
            $adviser->phone = $request->input('phone');
            $adviser->email = $request->input('email');
            $adviser->blood_group = $request->input('blood_group');
            if ($request->hasFile('photo')) {
                if ($adviser->photo) {
                    Storage::delete('public/' . $adviser->photo);
                }

                $adviser->photo = $request->file('photo')->store('foreign_committees', 'public');
            }

            $adviser->save();

            return redirect()->route('foreign.list')->with('success', 'কমিটির তথ্য আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $committee = ForeignCommittee::findOrFail($id);
        return view('admin.main.foreign_committee.show', compact('committee'));
    }

    public function destroy($id)
    {
        $committee = ForeignCommittee::find($id);
        // Delete the image if it exists
        if ($committee->image) {
            Storage::disk('public')->delete($committee->image);
        }
        $committee->delete();

        return redirect()->route('foreign.list')->with('success', 'কমিটির তথ্য ডিলিট করা হয়েছে!');
    }

    public function allForeignCommittee()
    {
        $committees = ForeignCommittee::orderBy('id', 'asc')->paginate(10);

        return view('frontend.main.foreign_committee', compact('committees'));
    }
}
