<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Comment;

class CommentController extends Controller
{
    public function add(Request $request, Event $event){
        $comment = new Comment;
        $comment->body = $request->comment;
        $comment->user_id = $request->userId;
        $comment->user_name = $request->userName;
        $comment->event_id = $event->id;
        $comment->save();
    }

    public function get(Event $event){
    	$comments = $event->comments;
    	return $comments;
    }
}
