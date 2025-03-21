<?php

use App\Models\ApplicationSetting;
use App\Models\Event;
use App\Models\User;

function generalSettings(){
    $application = ApplicationSetting::latest()->first();
    return $application;
}

function myEvent(){
    $event = Event::first();
    return $event;
}

function user($id)
{
    $users = User::auth()->user();
    return $users;
}