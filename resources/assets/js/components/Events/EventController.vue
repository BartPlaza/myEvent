<script>
	export default{
		data: function(){
			return {
				showModal: false,
				editingEvent: {}
			}
		},
		methods: {
			editEvent(event){
				this.showModal = true;
				this.editingEvent = event;
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
			eventBus.$on('hideModal', function(){
				el.showModal = false;
			});
			eventBus.$on('updateElement', function(id, event){
				el.updateEvent(id, event);
			});
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