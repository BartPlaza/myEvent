@extends('dashboard.dashboard_layout')
@section('dashboard_content')
<events-component inline-template>
	<div>
	<events-table :events="{{$events}}">
		
	</events-table>
		
	
	<events-editor></events-editor>

	</div>
</events-component>
<message-component v-cloak></message-component>
	@endsection