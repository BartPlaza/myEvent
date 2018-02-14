<div class="dashboard_menu">
	<div class="dashboard_menu_item">
    	<a href="/events/create" @if((isset($menuItem)) && ($menuItem == 0)) class="active" @endif><i class="fas fa-plus"></i></a><span>New event</span>
	</div>
	<div class="dashboard_menu_item">
    	<a href="/{{Auth::id()}}/events" @if((isset($menuItem)) && ($menuItem == 1)) class="active" @endif><i class="fas fa-list-ul"></i></a><span>My events</span>
    </div>
</div>
