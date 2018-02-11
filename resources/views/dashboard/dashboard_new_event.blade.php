@extends('dashboard.dashboard_layout')
@section('dashboard_content')
        <form class="dashboard-content col-lg-12" action="/event/create" method="POST">
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
                <label for="place">Place</label>
                <find-place></find-place>
            </div>
            <div class="form-group col-lg-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
@endsection