@extends('layouts.app')

@section('content')
<div id="event">
	<div class="event-header">
		<div class="header-date">
			<span>
				{{$event->startDate()}} 
			</span>
			<span>
				{{$event->startYear()}}
			</span>

		</div>
		<span>
			<span>
				<span>
					<span></span>
				</span>
			</span>
		</span>
		<div class="header-date">
			<span>
				Start at
			</span>
			<span>
				{{$event->startTime()}}
			</span>
		</div>
	</div>
	<div class="event-info col-xs-12">
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fas fa-comment-alt"></i>
		<span><h2>Name</h2><p>{{$event->title}}</p></span>
		</div>
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fas fa-map-marker-alt"></i>
		<span><h2>Location</h2><p id="event-location">No info</p></span>
		</div>
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fa fa-user"></i>
		<span><h2>Owner</h2><p>{{$event->owner->name}}</p></span>
		</div>
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fas fa-users"></i>
		<span><h2>Invited</h2><p>5 people</p></span>
		</div>	
	</div>
	<div class="event-description col-xs-12">
		<div class="event-panel panel col-md-6 col-sm-12">
			  <div class="panel-heading">Event description</div>
			  <div class="panel-body">
			    {{$event->description}}
			  </div>
		</div>
		<div class="event-panel panel col-md-6 col-sm-12">
			<div class="panel-heading">Live chat</div>
			<div class="panel-body">
			   
			</div>
		</div>
	</div>
	@if($event->place_id != '')
	<show-place  place-id="{{$event->place_id}}"></show-place>
	@endif
</div>
@endsection