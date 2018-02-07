@extends('layouts.app')

@section('content')
<workspace-navigation inline-template user="{{Auth::user()}}"> 
    <div class="workspace">
        <div class="sidebar col-md-2 col-sm-2 col-xs-2"> 
            <a href="#" :class="{'active' : elements[0].active}" v-on:click="createEvent()">New event</a>
            <a href="#" :class="{'active' : elements[1].active}" v-on:click="showMyEvents(1)">My events</a>
            <a href="#" :class="{'active' : elements[2].active}" v-on:click="showTab(2)">Invitations</a>
            <a href="#" :class="{'active' : elements[3].active}" v-on:click="showTab(3)">Another tab 1</a>
            <a href="#" :class="{'active' : elements[4].active}" v-on:click="showTab(4)">Another tab 2</a>
        </div>
        <div class="dashboard col-md-10 col-sm-10 col-xs-10">
            <div v-show="elements[0].active">
                <form class="col-lg-8 col-lg-offset-2
                col-md-10 col-md-offset-1 col-sm-12 col-xs-12 dashboard-content" action="/event/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" class="form-control" placeholder="Event title" required>
                    </div>
                    <div class="form-group col-lg-3 col-sm-6">
                        <label for="date">Date</label>
                        <input id="date" name="date" type="date" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3 col-sm-6">
                        <label for="time">Start time</label>
                        <input name="time" id="time" type="time" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5" placeholder="Event description" required></textarea>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12">
                        <button type="submit" class="btn btn-primary">Create</button>
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
                      <th scope="col" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody v-for="(event, index) in myEvents">
                    <tr :class="{'warning' : editingEvent.id == event.id}">
                      <th scope="row">@{{index + 1}}</th>
                      <td><input type="text" v-model="tempEvent.title" v-if="editingEvent.id == event.id" size="60"><span v-else>@{{event.title}}</span></td>
                      <td><input type="date" v-model="tempEvent.start_date" v-if="editingEvent.id == event.id" ><span v-else>@{{event.start_date}}</span></td>
                      <td><input type="time" v-model="tempEvent.start_time" v-if="editingEvent.id == event.id" ><span v-else>@{{event.start_time}}</span> </td>
                      <td class="text-center">
                        <a :href="'/event/' + event.id" 
                             class="btn btn-primary btn-sm"
                             v-show="editingEvent.id !== event.id">Show
                        </a>
                        <div class="btn btn-warning btn-sm" 
                             v-on:click="editEvent(event.id)"
                             v-show="editingEvent.id !== event.id">Edit
                        </div>
                        <div class="btn btn-danger btn-sm" 
                             v-on:click="deleteEvent(event.id)"
                             v-show="editingEvent.id !== event.id">Delete
                        </div>
                     </td>
                    </tr>
                    <tr :class="{'warning' : editingEvent.id == event.id}" v-show="editingEvent.id == event.id">
                        <td class="borderless"></td>
                        <td class="borderless"><textarea class="form-control" v-model="tempEvent.description" ></textarea></td>
                        <td class="borderless" colspan="2"></td>
                        <td class="borderless text-bottom text-center">
                            <div class="btn btn-default btn-sm"
                                 v-on:click="updateEvent()">Update
                            </div>
                            <div class="btn btn-default btn-sm"
                                 v-on:click="clearEditing()">Cancel
                            </div>
                        </td>
                    </tr>
                  </tbody>
                </table>
            </div>    
        </div>
    </div>
</workspace-navigation>

@endsection
