@extends('layouts.app')

@section('content')
<workspace-navigation inline-template user="{{Auth::user()}}"> 
    <div class="workspace">
        <div class="sidebar col-md-2"> 
            <a href="#" :class="{'active' : elements[0].active}" v-on:click="showTab(0)">New event</a>
            <a href="#" :class="{'active' : elements[1].active}" v-on:click="showMyEvents(1)">My events</a>
            <a href="#" :class="{'active' : elements[2].active}" v-on:click="showTab(2)">Invitations</a>
            <a href="#" :class="{'active' : elements[3].active}" v-on:click="showTab(3)">Another tab 1</a>
            <a href="#" :class="{'active' : elements[4].active}" v-on:click="showTab(4)">Another tab 2</a>
        </div>
        <div class="dashboard col-md-10">
            <div v-show="elements[0].active">
                Lorem
            </div>
            <div id="my-events" v-show="elements[1].active">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Date</th>
                      <th scope="col">Link</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(event, index) in myEvents">
                      <th scope="row">@{{index + 1}}</th>
                      <td>@{{event.title}}</td>
                      <td>@{{event.description}}</td>
                      <td>@{{event.start_date}}</td>
                      <td><a :href="'/event/' + event.id" class="btn btn-primary">Link</td>
                    </a>
                    </tr>
                  </tbody>
                </table>
            </div>    
        </div>
    </div>
</workspace-navigation>

@endsection
