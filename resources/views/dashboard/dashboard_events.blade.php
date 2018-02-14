@extends('dashboard.dashboard_layout')
@section('dashboard_content')
	<events-table :events="{{$events}}"></events-table>			
	<events-editor></events-editor>
	<message-component v-cloak></message-component>
@endsection