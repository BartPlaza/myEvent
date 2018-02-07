<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request){
    	$event = new Event;
    	$event->owner_id = Auth::id();
    	$event->title = $request->input('title');
    	$event->description = $request->input('description');
    	$event->start_date = $request->input('date');
    	$event->start_time = $request->input('time');
    	$event->save();
    }

    public function update(Request $request, Event $event)
    {
        return 'okk';
    }
}
