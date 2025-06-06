<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = generalSettings();
        $about = AboutUs::latest()->first();
        return view('frontend.main.contact', compact('settings', 'about'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'nullable|email',
                'message' => 'required|string',
            ]);

            $inputs = $request->all();
            $contact = new Contact();
            $contact->fill($inputs);
            $contact->save();

            return redirect()->back()->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে।');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function showContact()
    {
        $contacts = Contact::all();
        return view('admin.main.contact.index', compact('contacts'));
    }

    public function view(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.main.contact.show', compact('contact'));
    }
}
