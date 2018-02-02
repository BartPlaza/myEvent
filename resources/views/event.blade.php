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
				Event time
			</span>
			<span>
				{{$event->startTime()}}
			</span>
		</div>
	</div>
	<div class="event-info col-xs-12">
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fa fa-map-marker"></i>
		<span><h2>Location</h2><p>Adress</p></span>
		</div>
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fa fa-users"></i>
		<span><h2>Location</h2><p>Adress</p></span>
		</div>
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fa fa-user"></i>
		<span><h2>Location</h2><p>Adress</p></span>
		</div>
		<div class="event-info-section col-md-3 col-sm-6">
		<i class="fa fa-map-marker"></i>
		<span><h2>Location</h2><p>Adress</p></span>
		</div>	
	</div>
	<div class="event-description col-xs-12">
		<div class="event-panel panel col-md-6 col-sm-12">
			  <div class="panel-heading">Event description</div>
			  <div class="panel-body">
			    {{$event->description}}}
			  </div>
		</div>
		<div class="event-panel panel col-md-6 col-sm-12">
			<div class="panel-heading">Event description</div>
			<div class="panel-body">
			   {{$event->description}}}
			</div>
		</div>
	</div>
</div>
@endsection