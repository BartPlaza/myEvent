<template>
	
	<div id="invitations_container">
		<div class="invitations_section">
			<div class="section_number">
				<span>1</span>
			</div>
			<div class="section_content">
				Chose event:
				<select v-model="event">
					<option v-for="event in events">{{event.title}}</option>
				</select>
			</div>
		</div>
		<hr/>
		<div class="invitations_section" v-show="step === 2">
			<div class="section_number">
				<span>2</span>
			</div>
			<div class="section_content">
				Chose the type of invitation:
				<div class="btn btn-default btn-lg">email: <i class="far fa-envelope"></i></div>
				<div class="btn btn-default btn-lg">facebook: <i class="fab fa-facebook-square"></i>

</div>
			</div>
		</div>
	</div>

</template>


<script>
	
export default {
	props: ['events'],
	data: function(){
		return {
			event: '',
			step: 1
		}
	},
	watch: {
		event: function(){
			if(this.event != ''){
				this.step = 2;
			}
		}
	}
}



</script>



<style scoped>

#invitations_container {
	display: flex;
	flex-direction: column;
	justify-content: space-around;
}

.invitations_section {
	display: flex;
	flex-direction: row;
}

.section_number {
	width: 15%;
	display: flex;
	justify-content: center;
	align-items: center;

}

.section_number > span {
	width: 50px;
	height: 50px;
	border-radius: 25px;
	border: 2px solid grey;
	display: flex;
	justify-content: center;
	align-items: center;
	font-size: 24px;
	color: grey;
}

.section_content{
	width: 85%;
	display: flex;
	align-items: center;
	font-size: 22px;
}

.section_content > select {
	margin-left: 20px;
	min-width: 200px;
}

.section_content > .btn {
	margin-left: 20px;
}

</style>