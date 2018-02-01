<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;

class EventController extends Controller
{
    public function showAll(User $user) 
    {
    	return $user->events;
    }

    public function show(Event $event)
    {
    	return view('event', compact('event'));
    }
}
