<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.main.sponsor.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.main.sponsor.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'company' => 'required|string|max:255',
                'amount' => 'required',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            ]);

            $sponsor = new Sponsor();
            $sponsor->company = $request->company;
            $sponsor->amount = $request->amount;
            if ($request->hasFile('photo')) {
                $sponsor->photo = $request->file('photo')->store('sponsors', 'public');
            }
            $sponsor->save();

            return redirect()->route('sponsors')->with('success', 'Sponsor added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $sponsor = Sponsor::find($id);
        return view('admin.main.sponsor.edit', compact('sponsor'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'company' => 'required|string|max:255',
                'amount' => 'required',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            ]);

            $sponsor = Sponsor::findOrFail($id);

            $sponsor->company = $request->input('company');
            $sponsor->amount = $request->input('amount');
            if ($request->hasFile('photo')) {
                // Delete old image if it exists
                if ($sponsor->photo) {
                    Storage::delete('public/' . $sponsor->photo);
                }
                // Store the new image
                $sponsor->photo = $request->file('photo')->store('sponsors', 'public');
            }

            $sponsor->save();

            return redirect()->route('sponsors')->with('success', 'Sponsor information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $sponsor = Sponsor::find($id);
        // Delete the image if it exists
        if ($sponsor->image) {
            Storage::disk('public')->delete($sponsor->image);
        }
        $sponsor->delete();

        return redirect()->route('sponsors')->with('success', 'Sponsor deleted successfully.');
    }
}
