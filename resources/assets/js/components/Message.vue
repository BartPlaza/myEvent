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
					//el.resetMessage();		
					},3000);		
			},
			resetMessage: function(){
				let el = this;
				setTimeout(function(){
					el.message = '';
					el.type = '';
					},1000);
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