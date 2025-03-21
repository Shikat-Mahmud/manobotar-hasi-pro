<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('frontend.main.gallery', compact('galleries'));
    }

    public function galleryList()
    {
        $galleries = Gallery::all();
        return view('admin.main.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.main.gallery.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $path = $file->store('gallery', 'public');
                    Gallery::create([
                        'photo' => $path,
                    ]);
                }
            }

            return redirect()->route('gallery.list')->with('success', 'Photos uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        // Delete the image if it exists
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();

        return redirect()->route('gallery.list')->with('success', 'Photo deleted successfully.');
    }
}
