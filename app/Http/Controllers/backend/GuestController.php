<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('admin.main.guest.index', compact('guests'));
    }

    public function create()
    {
        return view('admin.main.guest.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $guest = new Guest();
            $guest->name = $request->name;
            $guest->designation = $request->designation;
            if ($request->hasFile('photo')) {
                $guest->photo = $request->file('photo')->store('guests', 'public');
            }
            $guest->save();

            return redirect()->route('guests')->with('success', 'Guest added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $guest = Guest::find($id);
        return view('admin.main.guest.edit', compact('guest'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $guest = Guest::findOrFail($id);

            $guest->name = $request->input('name');
            $guest->designation = $request->input('designation');
            if ($request->hasFile('photo')) {
                // Delete old image if it exists
                if ($guest->photo) {
                    Storage::delete('public/' . $guest->photo);
                }
                // Store the new image
                $guest->photo = $request->file('photo')->store('guests', 'public');
            }

            $guest->save();

            return redirect()->route('guests')->with('success', 'Guest information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $guest = Guest::find($id);
        // Delete the image if it exists
        if ($guest->image) {
            Storage::disk('public')->delete($guest->image);
        }
        $guest->delete();

        return redirect()->route('guests')->with('success', 'Guest deleted successfully.');
    }
}
