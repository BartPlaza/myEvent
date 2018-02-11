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
    	$events = $user->events;
    	return view('dashboard.dashboard_events', compact('events'));
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
    	$event->place_id = $request->input('place');
    	$event->save();

    	return redirect('/event/' . $event->id);
    }

    public function update(Request $request, Event $event)
    {
    	$event->title = $request->input('eventTitle');
    	$event->description = $request->input('eventDescription');
    	$event->start_date = $request->input('eventDate');
    	$event->start_time = $request->input('eventTime');
    	$event->save();
        return $event->id;
    }

    public function delete(Event $event){
    	$event->delete();
    	return $event->id;
    }
}
