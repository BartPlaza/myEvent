<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Comment;

class EventController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(Event $event)
    {
    	$comments = $event->comments;
    	return view('event', compact('event', 'comments'));
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
    	$event->title = $request->event['title'];
    	$event->description = $request->event['description'];
    	$event->start_date = $request->event['start_date'];
    	$event->start_time = $request->event['start_time'];
    	$event->place_id = $request->event['place_id'];
    	$event->save();
        return $event->id;
    }

    public function delete(Event $event){
    	$event->delete();
    	return $event->id;
    }

    public function invite(Request $request, Event $event){
        $event->sendInvitation($request->email);
        return 'aaaa';
    }
}
