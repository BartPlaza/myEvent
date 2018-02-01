<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EventController extends Controller
{
    public function showAll(User $user) 
    {
    	$events = $user->events;
    	return view('home', compact('events'));
    }
}
