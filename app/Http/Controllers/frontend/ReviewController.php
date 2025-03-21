<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $batchs = range(2000, 2026);
        return view('frontend.main.review', compact('batchs'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'batch' => 'nullable',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'message' => 'required|string',
            ]);

            $inputs = $request->all();
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('reviews', 'public');
                $inputs['photo'] = $imagePath;
            }

            $review = new Review();
            $review->fill($inputs);
            $review->save();

            return redirect()->back()->with('success', 'Review submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function showReviews()
    {
        $reviews = Review::all();
        return view('admin.main.review.index', compact('reviews'));
    }


    public function changeStatus(Review $review)
    {
        try {
            $review->status = $review->status == 1 ? 0 : 1;
            $review->save();

            return redirect()->back()->with('message', 'Status Change Successfully');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error changing review status: ' . $e->getMessage());

            // Return an error message or handle it as needed
            return redirect()->back()->with('error', 'Error changing review status');
        }
    }

}
