<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::latest()->first();
        return view('frontend.main.about', compact('about'));
    }

    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('admin.main.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'organization_name' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'slogan' => 'nullable|string',
            'stablished_date' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'other_info' => 'nullable|string',
        ]);

        $about = AboutUs::findOrFail($id);
        $about->organization_name = $request->organization_name;
        $about->description = $request->description;
        $about->slogan = $request->slogan;
        $about->location = $request->location;
        $about->stablished_date = $request->stablished_date;
        $about->other_info = $request->other_info;

        if ($request->hasFile('image')) {
            $about->image = $request->file('image')->store('about', 'public');
        }

        if ($request->hasFile('image2')) {
            $about->image2 = $request->file('image2')->store('about', 'public');
        }

        $about->save();

        return redirect()->route('show.about')->with('success', 'প্রতিষ্ঠানের তথ্য সফলভাবে আপডেট করা হয়েছে!');
    }

    public function show()
    {
        $about = AboutUs::latest()->first();
        return view('admin.main.about.show', compact('about'));
    }
}
