<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function newEvent() {
    	return view('dashboard.dashboard_new_event');
    }

    public function events() {
    	return view('dashboard.dashboard_events');
    }
}
