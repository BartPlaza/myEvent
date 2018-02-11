<template>
	<transition name="roll">
	<div class="message alert" :class="type" v-show="show">{{message}}</div>
	</transition>
</template>

<script>
	export default{
		data: function(){
			return {
				show: false,
				message: '',
				type: ''
			}
		},
		mounted: function(){
			let el = this;
			eventBus.$on('showMessage', function(message, type){
				el.message = message;
				el.type = type;
				el.flashMessage();
				//el.resetMessage();
			});
		},
		methods: {
			flashMessage: function(){
				let el = this;
				this.show = true;
					setTimeout(function(){
					el.show = false;
						
					},3000);
					el.resetMessage();	
			},
			resetMessage: function(){
				setTimeout(function(){
					//el.message = '';
					//el.type = '';
					alert('reseted');
					},1500);
			}
		}
	}
</script>

<style scoped>
 .message{
	position: fixed;

	bottom: 80px;
	right: 0;
	z-index: 1000;
	font-size: 18px;
	white-space: nowrap;
 }

 .roll-enter-active, .roll-leave-active {
	transition: all 1s;
}
.roll-enter{
	transform: translate(100%, 0);
}

.roll-leave-to{
	opacity: 0;
}

</style>