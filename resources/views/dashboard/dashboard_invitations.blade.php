@extends('dashboard.dashboard_layout')
@section('dashboard_content')
	<invitations-panel :events="{{$events}}"></invitations-panel>
@endsection