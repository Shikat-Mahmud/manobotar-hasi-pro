<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('admin.main.donation.index', compact('donations'));
    }

    public function create()
    {
        return view('admin.main.donation.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'amount' => 'required',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            ]);

            $donation = new Donation();
            $donation->name = $request->name;
            $donation->amount = $request->amount;
            if ($request->hasFile('photo')) {
                $donation->photo = $request->file('photo')->store('donations', 'public');
            }
            $donation->save();

            return redirect()->route('donations')->with('success', 'Donation added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $donation = Donation::find($id);
        return view('admin.main.donation.edit', compact('donation'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'amount' => 'required',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            ]);

            $donation = Donation::findOrFail($id);

            $donation->name = $request->input('name');
            $donation->amount = $request->input('amount');
            if ($request->hasFile('photo')) {
                // Delete old image if it exists
                if ($donation->photo) {
                    Storage::delete('public/' . $donation->photo);
                }
                // Store the new image
                $donation->photo = $request->file('photo')->store('donations', 'public');
            }

            $donation->save();

            return redirect()->route('donations')->with('success', 'Donation information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $donation = Donation::find($id);
        // Delete the image if it exists
        if ($donation->image) {
            Storage::disk('public')->delete($donation->image);
        }
        $donation->delete();

        return redirect()->route('donations')->with('success', 'Donation deleted successfully.');
    }

    public function donerShow()
    {
        $setting = generalSettings();
        $doners = Donation::all();
        return view('frontend.main.our_doner', compact('setting', 'doners'));
    }
}
