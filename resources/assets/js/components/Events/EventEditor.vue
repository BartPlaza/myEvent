<template>
	<form class="dashboard-content col-lg-12" action="/event/create" method="POST">
        <div class="form-group col-lg-6 col-sm-12">
            <label for="title">Title</label>
            <input name="title" id="title" type="text" class="form-control" v-model="tempEvent.title" required>
        </div>
        <div class="form-group col-lg-3 col-sm-6">
            <label for="date">Date</label>
            <input id="date" name="date" type="date" class="form-control" v-model="tempEvent.start_date" required>
        </div>
        <div class="form-group col-lg-3 col-sm-6">
            <label for="time">Start time</label>
            <input name="time" id="time" type="time" class="form-control" v-model="tempEvent.start_time" required>
        </div>
        <div class="form-group col-lg-12 col-sm-12">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5" placeholder="Event description" v-model="tempEvent.description" required></textarea>
        </div>
        <div class="form-group col-lg-12 col-sm-12">
            <label for="place">New place (leave empty if not changed)</label>
            <find-place></find-place>
        </div>
        <div class="form-group col-lg-12 col-sm-12">
            <div class="btn btn-primary" v-on:click="updateEvent">Update</div>
            <div class="btn btn-default" v-on:click="hideModal">Cancel</div>
        </div>
	</form>
</template>
<script>
	export default{
		props: {
			event: {
				type: Object,
				required: true
			}
		},
		computed: {
			tempEvent: function(){
				let temp = {};
				Object.assign(temp, this.event);
				return temp;
			}
		},
		created: function(){
			let el = this;
			eventBus.$on('updateLocation', function(id){
				el.tempEvent.place_id = id;
			});
		},
		methods: {
			test(){
				alert('ok');
			},
			updateEvent(){
				if(this.compareItems()){

				}else {
					eventBus.$emit('showMessage','Nothing has changed', 'alert-danger');
				}
			},
			compareItems(){
				let el = this;
				let value = false;
				let props = Object.getOwnPropertyNames(this.tempEvent);
				props.shift();
				props.forEach(function(prop){
					if(el.tempEvent[prop] != el.event[prop]){
						value = true;
					}
				})
				console.log(value);
			},
			hideModal: function(){
				eventBus.$emit('hideModal');
			}
		}
	}
</script>