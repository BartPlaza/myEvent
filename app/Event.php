<?php

namespace App;
use Carbon\Carbon;
use App\Mail\Invitation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Event extends Model
{
    public function owner()
    {
    	return $this->belongsTo('App\User');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function startDate() {
    	$date = Carbon::parse($this->start_date);
    	return $date->day.' '.$date->format('F');
    }

     public function startYear() {
    	$date = Carbon::parse($this->start_date);
    	return $date->year;
    }

     public function startTime() {
    	$time = Carbon::parse($this->start_time)->format('y:m');
    	return $time;
    }

    public function sendInvitation($email){
        Mail::to($email)->send(new Invitation($this));
    }
}
