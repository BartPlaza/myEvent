@extends('layouts.app')

@section('content')
<workspace-navigation inline-template user="{{Auth::user()}}"> 
    <div class="workspace">
        <div class="sidebar col-md-2"> 
            <a href="#" :class="{'active' : elements[0].active}" v-on:click="createEvent()">New event</a>
            <a href="#" :class="{'active' : elements[1].active}" v-on:click="showMyEvents(1)">My events</a>
            <a href="#" :class="{'active' : elements[2].active}" v-on:click="showTab(2)">Invitations</a>
            <a href="#" :class="{'active' : elements[3].active}" v-on:click="showTab(3)">Another tab 1</a>
            <a href="#" :class="{'active' : elements[4].active}" v-on:click="showTab(4)">Another tab 2</a>
        </div>
        <div class="dashboard col-md-10">
            <div v-show="elements[0].active">
                <form class="col-md-8 dashboard-content" action="/event/create" method="POST">
                    {{csrf_field()}}
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <input name="title" id="title" type="text" class="form-control" placeholder="Event title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input id="date" name="date" type="date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="time">Start time</label>
                            <input name="time" id="time" type="time" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5" placeholder="Event description" required></textarea>
                    </div>
                    <div class="form-group col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
             <div v-show="eventEditing">
                <form class="col-md-8 dashboard-content" action="/event/" method="POST">
                    {{csrf_field()}}
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <input name="title" id="title" type="text" class="form-control" placeholder="Event title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input id="date" name="date" type="date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="time">Start time</label>
                            <input name="time" id="time" type="time" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5" placeholder="Event description" required></textarea>
                    </div>
                    <div class="form-group col-md-12 text-right">
                        <button class="btn btn-primary" v-on:click="{eventEditing = false}">Cancel</button>
                        <button type="submit" class="btn btn-default">Cancel</button>
                    </div>
                </form>
            </div>
            <div id="my-events" class="dashboard-content" v-show="elements[1].active">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Show</th>
                      <th scope="col">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(event, index) in myEvents">
                      <th scope="row">@{{index + 1}}</th>
                      <td>@{{event.title}}</td>
                      <td>@{{event.start_date}}</td>
                      <td>@{{event.start_time}}</td>
                      <td><a :href="'/event/' + event.id" class="btn btn-primary">Show</td>
                      <td><div class="btn btn-warning" v-on:click="editEvent(event.id)">Edit</td>
                    </a>
                    </tr>
                  </tbody>
                </table>
            </div>    
        </div>
    </div>
</workspace-navigation>

@endsection
