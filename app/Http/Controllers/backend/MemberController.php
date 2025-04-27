<?php

namespace App\Http\Controllers\backend;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('id', 'asc')->get();
        return view('admin.main.member.index', compact('members'));
    }


    public function create()
    {
        return view('admin.main.member.create');
    }


    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15|unique:event_registers,phone',
                'address' => 'nullable|string|max:255',
                'blood_group' => 'nullable|string|max:5',
            ]);

            $member = new Member();
            $member->name = $request->name;
            $member->phone = $request->phone;
            $member->address = $request->address;
            $member->blood_group = $request->blood_group;
            $member->save();

            return redirect()->route('member.list')->with('success', 'সদস্য যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    
    public function edit(string $id)
    {
        $member = Member::find($id);
        return view('admin.main.member.edit', compact('member'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15|unique:event_registers,phone',
                'address' => 'nullable|string|max:255',
                'blood_group' => 'nullable|string|max:5',
            ]);

            $member = Member::findOrFail($id);

            $member->name = $request->input('name');
            $member->phone = $request->input('phone');
            $member->address = $request->input('address');
            $member->blood_group = $request->input('blood_group');
            $member->save();

            return redirect()->route('member.list')->with('success', 'সদস্যের তথ্য আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('member.list')->with('success', 'সদস্যের তথ্য ডিলিট করা হয়েছে!');
    }

    public function allMembers()
    {
        $members = Member::orderBy('id', 'asc')->paginate(20);

        return view('frontend.main.member', compact('members'));
    }
}
