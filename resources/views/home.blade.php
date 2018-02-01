@extends('layouts.app')

@section('content')
<workspace-navigation inline-template user="{{Auth::user()}}"> 
    <div class="workspace">
        <div class="sidebar col-md-2"> 
            <a href="#" :class="{'active' : elements[0].active}" v-on:click="showTab(0)">New event</a>
            <a href="#" :class="{'active' : elements[1].active}" v-on:click="showTab(1)">My events</a>
            <a href="#" :class="{'active' : elements[2].active}" v-on:click="showTab(2)">Invitations</a>
            <a href="#" :class="{'active' : elements[3].active}" v-on:click="showTab(3)">Another tab 1</a>
            <a href="#" :class="{'active' : elements[4].active}" v-on:click="showTab(4)">Another tab 2</a>
        </div>
        <div class="dashboard col-md-10">
            <div v-show="elements[0].active">
                Lorem
            </div>
            <my-events v-show="elements[1].active" user="{{Auth::user()}}"></my-events>
         

            </div>
        </div>
    </div>
</workspace-navigation>

@endsection
