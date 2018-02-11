@extends('layouts.app')

@section('content')
<workspace-navigation inline-template user="{{Auth::user()}}"> 
    <div class="workspace">
            <div id="my-events" class="dashboard-content" v-show="elements[1].active">
                
            </div>    
        </div>
    </div>
</workspace-navigation>

@endsection
