<template>
	
	<div id="invitations_container">
		<div class="invitations_section">
			<div class="section_number">
				<svg height="100" width="100" class="section_number_icon">
					<circle cx="50" cy="50" r="25" stroke="lightgrey" stroke-width="2px" fill="none"/>
					<circle class="circle_start" :class="{'circle_end': event != ''}" cx="50" cy="50" r="25" stroke="#5cb85c" stroke-width="3px" fill="none"/>
					<text :class="{'text_end': event != ''}" x="44" y="57" fill="grey">1</text>
				</svg>
			</div>
			<div class="section_content">
				Chose event:
				<select v-model="event" class="form-control">
					<option v-for="event in events" :value="event.id">{{event.title}}</option>
				</select>
			</div>
		</div>
		<hr/>
		<div class="invitations_section" v-show="event != ''">
			<div class="section_number">	
				<svg height="100" width="100" class="section_number_icon">
					<circle cx="50" cy="50" r="25" stroke="lightgrey" stroke-width="2px" fill="none"/>
					<circle class="circle_start" :class="{'circle_end' : method != ''}" cx="50" cy="50" r="25" stroke="#5cb85c" stroke-width="3px" fill="none"/>
					<text :class="{'text_end': method != ''}" x="44" y="57" fill="grey">2</text>
				</svg>
			</div>
			<div class="section_content">
				Chose the type of invitation:
				<div class="btn btn-default btn-lg" :class="{'method_selected' : method === 1}" @click.prevent = "method = 1">email: <i class="far fa-envelope"></i></div>
				<div class="btn btn-default btn-lg" :class="{'method_selected' : method === 2}" @click.prevent = "method = 2">facebook: <i class="fab fa-facebook-square"></i>
				</div>
			</div>
		</div>
		<hr/>
		<div class="invitations_section" v-show="method === 1">
			<div class="section_number">	
				<svg height="100" width="100" class="section_number_icon">
					<circle cx="50" cy="50" r="25" stroke="lightgrey" stroke-width="2px" fill="none"/>
					<circle class="circle_start" :class="{'circle_end' : send, 'circle_during' : during}"cx="50" cy="50" r="25" stroke="#5cb85c" stroke-width="3px" fill="none"/>
					<text :class="{'text_end' : send}" x="44" y="57" fill="grey">3</text>
				</svg>
			</div>
			<form class="section_content" @submit.prevent="sendEmail">
				Enter invited user email:
				<input type="email" class="form-control" v-model="email" required>
				<button type="submit" class="btn btn-default">Send</button>
			</form>
		</div>
		<div class="alert alert-success" v-show="send">
			Mail with invitation was send!
		</div>
	</div>

</template>


<script>
	
export default {
	props: ['events'],
	data: function(){
		return {
			event: '',
			method: '',
			email: '',
			during: false,
			send: false
		}
	},
	methods: {
		sendEmail(){
			if(this.email != ''){
				this.during = true;
				axios({
				method: 'post',
				url: '/event/'+this.event+'/invite',
				data: {
					email: this.email
					}
				})
				.then((response)=>{
					this.during = false;
					this.send = true;

					setTimeout(()=>{
						this.email= '';
						this.send = false;
					},2000);
				})
				.catch((error)=>{
					console.log(error);
				});
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

.section_number_icon > text {
	font-size: 26px;
}

.text_end {
	fill: #5cb85c;
	transition: fill 1s;
}

.circle_start {
	stroke-dasharray: 156.06741333007812;
	stroke-dashoffset: 156.06741333007812;

}

.circle_during {
	stroke-dashoffset: 95;
	transition: stroke-dashoffset 1s;
}

.circle_end {
	stroke-dashoffset: 0;
	transition: stroke-dashoffset 1s;
}

.method_selected {
	background-color: lightgrey;
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
	max-width: 300px;
}

.section_content > .btn {
	margin-left: 20px;
}

.section_content > input {
	width: 300px;
	margin-left: 20px;
}

</style>