<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventSchedule;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function getEventDate()
    {
        $event = Event::first(); // Fetch the event (adjust the query as needed)
        return response()->json(['datetime' => $event->datetime]);
    }

    public function eventDetail()
    {
        $event = Event::first();
        $setting = generalSettings();
        $event_schedule = EventSchedule::where('event_id', 1)->get();
        $guests = Guest::all();
        return view('frontend.main.event', compact('event', 'setting', 'event_schedule', 'guests'));
    }

    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-event', 'edit-event', 'show-event', 'delete-event',])) {
            $events = Event::all();
            return view('admin.main.event.index', compact('events'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to events.');
        }
    }

    public function create()
    {
        if (auth()->user()->can('create-event')) {
            return view('admin.main.event.create');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to add event.');
        }
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'datetime' => 'required|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'location' => 'nullable|string|max:255',
            ]);

            $event = new Event();
            $event->name = $request->name;
            $event->datetime = $request->datetime;

            if ($request->hasFile('image')) {
                $event->image = $request->file('image')->store('events', 'public');
            }

            $event->description = $request->description;
            $event->location = $request->location;
            $event->save();

            return redirect()->route('events')->with('success', 'Event created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        if (auth()->user()->can('edit-event')) {
            $event = Event::find($id);
            return view('admin.main.event.edit', compact('event'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to edit event.');
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'datetime' => 'required|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'location' => 'nullable|string|max:255',
            ]);

            $event = Event::findOrFail($id);

            $event->name = $request->input('name');
            $event->datetime = $request->input('datetime');
            $event->location = $request->input('location');
            $event->description = $request->input('description');

            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($event->image) {
                    Storage::delete('public/' . $event->image);
                }

                // Store the new image
                $event->image = $request->file('image')->store('events', 'public');
            }

            $event->save();

            return redirect()->route('events')->with('success', 'Event updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        if (auth()->user()->can('delete-event')) {
            $event = Event::find($id);
            // Delete the image if it exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $event->delete();

            return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete event.');
        }
    }
}
