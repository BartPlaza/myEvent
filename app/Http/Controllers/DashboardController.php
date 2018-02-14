<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function newEvent() {
    	return view('dashboard.dashboard_new_event')->with('menuItem',0);
    }

    public function events(User $user) {
    	$events = $user->events;
    	return view('dashboard.dashboard_events', compact('events'))->with('menuItem',1);
    }
}
