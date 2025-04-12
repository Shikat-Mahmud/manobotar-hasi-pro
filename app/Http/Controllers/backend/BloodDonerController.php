<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BloodDoner;
use Illuminate\Http\Request;

class BloodDonerController extends Controller
{
    public function index()
    {
        $doners = BloodDoner::all();
        return view('frontend.main.blood_doner', compact('doners'));
    }

    public function list()
    {
        $doners = BloodDoner::all();
        return view('admin.main.blood_doner.index', compact('doners'));
    }

    public function create()
    {
        $bloodGroups = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];
        return view('admin.main.blood_doner.create', compact('bloodGroups'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'blood_group' => 'required|string|in:' . implode(',', ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+"]),
                'phone' => 'required|string|max:15',
                'email' => 'nullable|email|max:100',
                'address' => 'nullable|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $doner = new BloodDoner();
            $doner->name = $request->name;
            $doner->blood_group = $request->blood_group;
            $doner->phone = $request->phone;
            $doner->email = $request->email;
            $doner->address = $request->address;
            if ($request->hasFile('photo')) {
                $doner->photo = $request->file('photo')->store('doners', 'public');
            }
            $doner->save();

            return redirect()->route('blood-doner.list')->with('success', 'নতুন রক্তদাতা যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function show(int $id)
    {
        $doner = BloodDoner::find($id);
        if ($doner) {
            return view('admin.main.blood_doner.show', compact('doner'));
        } else {
            return redirect()->back()->with('error', 'রক্তদাতা খুঁজে পাওয়া যায়নি!');
        }
    }

    public function edit(int $id)
    {
        $doner = BloodDoner::find($id);
        $bloodGroups = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];

        return view('admin.main.blood_doner.edit', compact('doner', 'bloodGroups'));
    }

    public function update(Request $request, int $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'blood_group' => 'required|string|in:' . implode(',', ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+"]),
                'phone' => 'required|string|max:15',
                'email' => 'nullable|email|max:100',
                'address' => 'nullable|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|boolean',
            ]);

            $doner = BloodDoner::find($id);
            $doner->name = $request->name;
            $doner->blood_group = $request->blood_group;
            $doner->phone = $request->phone;
            $doner->email = $request->email;
            $doner->address = $request->address;
            $doner->status = $request->status;
            if ($request->hasFile('photo')) {
                $doner->photo = $request->file('photo')->store('doners', 'public');
            }
            $doner->save();

            return redirect()->route('blood-doner.list')->with('success', 'রক্তদাতা আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $doner = BloodDoner::find($id);
            if ($doner) {
                $doner->delete();
                return redirect()->route('blood-doner.list')->with('success', 'রক্তদাতা মুছে ফেলা হয়েছে!');
            } else {
                return redirect()->back()->with('error', 'রক্তদাতা খুঁজে পাওয়া যায়নি!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function changeStatus(int $id)
    {
        try {
            $doner = BloodDoner::find($id);
            if ($doner) {
                $doner->status = $doner->status == 1 ? 0 : 1;
                $doner->save();
                return back()->with('success', 'রক্তদাতার স্ট্যাটাস পরিবর্তন করা হয়েছে!');
            } else {
                return back()->with('error', 'রক্তদাতা খুঁজে পাওয়া যায়নি!');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
