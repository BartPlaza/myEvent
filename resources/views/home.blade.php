@extends('layouts.app')

@section('content')
<div class="workspace">
    <workspace-navigation inline-template> 
        <div class="sidebar col-md-2"> 
            <a href="#">New event</a>
            <a href="#">My events</a>
            <a href="#">Invitations</a>
            <a href="#">Another tab 1</a>
            <a href="#">Another tab 2</a>
        </div>
    </workspace-navigation>
    <div class="dashboard col-md-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum itaque numquam porro, earum enim dolorum nesciunt pariatur hic, vitae fuga, labore, atque alias commodi! Veritatis facere nesciunt ab, culpa cupiditate?
    </div>
</div>
@endsection
