<template>
	<transition name="fade">
	<div class="modal_window" v-show="show" >
		<div class="modal_well" >
			<form class="dashboard-content col-lg-12">
		        <div class="form-group col-lg-6 col-sm-12">
		            <label for="title">Title</label>
		            <input required  name="title" id="title" type="text" class="form-control" v-model="tempEvent.title" >
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
		            <label for="place">Place</label>
		            <find-place></find-place>
		        </div>
		        <div class="form-group col-lg-12 col-sm-12">
		            <div class="btn btn-primary" v-on:click="updateEvent">Update</div>
		            <button type="reset" class="btn btn-default" v-on:click="closeModal">Cancel</button>
		        </div>
			</form>
		</div>
		<i class="far fa-times-circle modal_close" v-on:click="closeModal"></i>
	</div>
	</transition>
	
</template>
<script>
	export default{
		data: function(){
			return {
				event: {},
				show: false
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
			eventBus.$on('showModal', function(event){
				el.event = event;
				el.show = true;
			});
		},
		methods: {
			updateEvent(){;
				let el = this;
				if(this.compareItems() == true){
					axios({
                        method: 'put',
                        url: '/event/'+this.event.id+'/edit',
                        data: {
                        	event: el.tempEvent
                        	}
                        })
                        .then(function (response) {
                    		eventBus.$emit('updateRow', el.tempEvent, response.data);
                    		eventBus.$emit('showMessage','Event successfully updated!', 'alert-success');
                    		el.closeModal();
                        })
                        .catch(function (error) {
                            eventBus.$emit('showMessage','Sorry, try again later.', 'alert-danger');
                            console.log(error);
                        });
				}else {
					eventBus.$emit('showMessage','Nothing has changed.', 'alert-danger');
				}
			},
			compareItems(){
				let el = this;
				let value = false;
				let props = Object.getOwnPropertyNames(this.tempEvent);
				props.shift();
				props.forEach(function(prop){
					if(el.tempEvent[prop] == ''){
						return false;
					}
					if(el.tempEvent[prop] != el.event[prop]){
						value = true;
					}
				});
				return value;
			},
			closeModal(){
				this.show = false;
				this.event = {};
				eventBus.$emit('clearPlace');
			}
		}
	}
</script>
<style>
/*Animations*/
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>