<dashboard-navigation inline-template>
	<div class="dashboard_navigation" :class="{'show': show}">
		<div class="dashboard_menu"> 
		    <a href="/events/create">New event</a>
		    <a href="/{{Auth::id()}}/events">My events</a>
		</div>
		<div class="dashboard_mobile" v-on:click="show = !show">
			<i class="fas fa-arrow-right"></i>
		</div>
	</div>
</dashboard-navigation>
<style scoped>
	.show{
		margin-left: 0;
	}

	
</style>