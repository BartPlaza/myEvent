@extends('dashboard.dashboard_layout')
@section('dashboard_content')
<events-component inline-template>
	<div id="events_table_wrapper">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Title</th>
		      <th scope="col">Date</th>
		      <th scope="col">Time</th>
		      <th scope="col" class="text-center">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($events as $event)
		    <tr event_id="{{$event->id}}">
		      <th scope="row">{{$loop->iteration}}</th>
		      <td class="event_title">{{$event->title}}</td>
		      <td class="no-wrap event_start_date">{{$event->start_date}}</td>
		      <td class="event_start_time">{{$event->start_time}}</td>
		      <td class="text-center no-wrap">
		        <a href="/event/{{$event->id}}" 
		           class="btn btn-primary btn-sm"
		             >Show
		        </a>
		        <div class="btn btn-warning btn-sm"
		        	 v-on:click="editEvent({{$event}})"
		             >Edit
		        </div>
		        <div class="btn btn-danger btn-sm" v-on:click="deleteEvent({{$event->id}})">Delete
		        </div>
		     </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	<transition name="fade">
	<div class="modal_window" v-if="showModal" >
		<div class="modal_well" >
			<events-editor :event="editingEvent"></events-editor>
	        <i class="far fa-times-circle modal_close" v-on:click="showModal = false"></i>
			</div>
		</div>
	</transition>
	</div>
</events-component>
<message-component v-cloak></message-component>
	@endsection