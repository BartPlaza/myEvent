@extends('layouts.app')

@section('content')
	<div class="workspace">
		@include('dashboard.dashboard_menu')
		<div id="dashboard_content">
			@yield('dashboard_content')
		</div>
	</div>
@endsection