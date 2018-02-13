<template>
	<tr>
      <th scope="row">1</th>
      <td class="event_title">{{eventData.title}}</td>
      <td class="no-wrap event_start_date">{{eventData.start_date}}</td>
      <td class="event_start_time">{{eventData.start_time}}</td>
      <td class="text-center no-wrap">
        <a :href="'/event/' + eventData.id" 
           class="btn btn-primary btn-sm"
             >Show
        </a>
        <div class="btn btn-warning btn-sm"
        	 v-on:click="editEvent(eventData.id)"
             >Edit
        </div>
        <div class="btn btn-danger btn-sm" v-on:click="deleteEvent(eventData.id)">Delete
        </div>
     </td>
    </tr>
</template>
<script>
	export default {
		props: ['event'],
		data: function(){
			return {
				eventData: this.event
			}
		},
		methods: {
			editEvent(){
				eventBus.$emit('showModal', this.event);
			},
			deleteEvent(id){
				let el = this;
                if (confirm("Do you really want to delete this event?")) {
                    axios({
                    method: 'delete',
                    url: '/event/'+id+'/delete'
                    })
                    .then(function (response) {
                        el.deleteItem(id);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                } 
			},
			deleteItem(id){
				let child = document.querySelector("[event_id='"+id+"']");
				child.style.opacity="0";
				setTimeout(function(){
					child.parentNode.removeChild(child);
				},1000);
			}
		},
		created: function(){
			let el = this;
			eventBus.$on('updateRow', function(event, id){
				if(el.event.id == id){
					el.eventData = event;
				}
			});
		}
	}
</script>