@extends('layouts.app')

@section('content')
<video autoplay muted loop>
  <source src="videos/background.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
<div class="welcome">
    <div class="hero">
    <h1>Events for everyone</h1>
    <a class="btn" href="{{route('dashboard')}}">Create event</a>
    </div>
    <div class="possibilities col-sm-12">
        <div class="possibility col-sm-12 col-md-4">
            <i class="far fa-calendar"></i>
            <p>Create your own event</p>
        </div>
        <div class="possibility col-sm-12 col-md-4">
            <i class="fas fa-users"></i>
            <p>Invite your frends</p>
        </div>
        <div class="possibility col-sm-12 col-md-4">
            <i class="far fa-envelope"></i>
            <p>Get notifications</p>
        </div>
    </div>
</div>

@endsection
