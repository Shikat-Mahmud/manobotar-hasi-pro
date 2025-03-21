<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Adviser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdviserController extends Controller
{
    public function index()
    {
        $advisers = Adviser::all();
        return view('frontend.main.adviser', compact('advisers'));
    }

    public function list()
    {
        $advisers = Adviser::all();
        return view('admin.main.adviser.index', compact('advisers'));
    }

    public function create()
    {
        return view('admin.main.adviser.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'title' => 'nullable|string',
                'phone' => 'nullable|string',
                'email' => 'nullable|email',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $adviser = new Adviser();
            $adviser->name = $request->name;
            $adviser->title = $request->title;
            $adviser->phone = $request->phone;
            $adviser->email = $request->email;
            if ($request->hasFile('photo')) {
                $adviser->photo = $request->file('photo')->store('advisers', 'public');
            }
            $adviser->save();

            return redirect()->route('adviser.list')->with('success', 'উপদেষ্টা যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $adviser = Adviser::find($id);
        return view('admin.main.adviser.edit', compact('adviser'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'title' => 'nullable|string',
                'phone' => 'nullable|string',
                'email' => 'nullable|email',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $adviser = Adviser::findOrFail($id);

            $adviser->name = $request->input('name');
            $adviser->title = $request->input('title');
            $adviser->phone = $request->input('phone');
            $adviser->email = $request->input('email');
            if ($request->hasFile('photo')) {
                // Delete old image if it exists
                if ($adviser->photo) {
                    Storage::delete('public/' . $adviser->photo);
                }
                // Store the new image
                $adviser->photo = $request->file('photo')->store('advisers', 'public');
            }

            $adviser->save();

            return redirect()->route('adviser.list')->with('success', 'উপদেষ্টার তথ্য আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $adviser = Adviser::find($id);
        // Delete the image if it exists
        if ($adviser->image) {
            Storage::disk('public')->delete($adviser->image);
        }
        $adviser->delete();

        return redirect()->route('adviser.list')->with('success', 'উপদেষ্টার তথ্য ডিলিট করা হয়েছে!');
    }
}
