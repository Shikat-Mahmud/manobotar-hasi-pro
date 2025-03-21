<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventScheduleController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-event-schedule', 'edit-event-schedule', 'show-event-schedule', 'delete-event-schedule'])) {
            $event_schedule = EventSchedule::all();
            return view('admin.main.event_schedule.index', compact('event_schedule'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to events schedule.');
        }
    }
    public function create()
    {
        if (auth()->user()->can('create-event-schedule')) {
            $events = Event::all();
            return view('admin.main.event_schedule.create', compact('events'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to add event schedule.');
        }
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'event_id' => 'required|exists:events,id',
                'sl_no' => 'required|integer',
                'time' => 'required|string',
                'description' => 'nullable|string',
            ]);
    
            $event_schedule = new EventSchedule();
            $event_schedule->event_id = $request->event_id;
            $event_schedule->sl_no = $request->sl_no;
            $event_schedule->time = $request->time;
            $event_schedule->description = $request->description;
            $event_schedule->save();
    
            return redirect()->route('event.schedule')->with('success', 'Event schedule created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    


    public function edit(string $id)
    {
        if (auth()->user()->can('edit-event-schedule')) {
            $events = Event::all();
            $event_schedule = EventSchedule::findOrFail($id);
            return view('admin.main.event_schedule.edit', compact('events', 'event_schedule'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to edit event schedule.');
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'event_id' => 'required|exists:events,id',
                'sl_no' => 'required|integer',
                'time' => 'required|string',
                'description' => 'nullable|string',
            ]);

            $event_schedule = EventSchedule::findOrFail($id);
            $event_schedule->event_id = $request->event_id;
            $event_schedule->sl_no = $request->sl_no;
            $event_schedule->time = $request->time;
            $event_schedule->description = $request->description;
            $event_schedule->save();

            return redirect()->route('event.schedule')->with('success', 'Event schedule updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        if (auth()->user()->can('delete-event-schedule')) {
            EventSchedule::find($id)->delete();
            return redirect()->back()->with('success', 'Event schedule deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete event schedule.');
        }
    }
}
