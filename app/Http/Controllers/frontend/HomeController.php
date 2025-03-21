<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventSchedule;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\Sponsor;

class HomeController extends Controller
{
    public function index(){
        $event = Event::first();
        $event_schedule = EventSchedule::where('event_id', 1)->get();
        $reviews = Review::where('status', 1)->inRandomOrder()->get();
        $galleries = Gallery::latest()->limit(8)->inRandomOrder()->get();
        $sponsors = Sponsor::all();
        return view('frontend.main.home', compact('event', 'event_schedule', 'reviews', 'galleries', 'sponsors'));
    }

    public function appDownload()
    {
        return view('frontend.main.download_app');
    }
}
