<?php

use App\Models\ApplicationSetting;
use App\Models\Event;
use App\Models\Project;
use App\Models\User;

function generalSettings(){
    $application = ApplicationSetting::latest()->first();
    return $application;
}

function projects(){
    $projects = Project::all();
    return $projects;
}

function user($id)
{
    $users = User::auth()->user();
    return $users;
}