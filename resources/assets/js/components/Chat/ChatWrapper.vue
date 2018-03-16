<template>
	<div class="panel-body">
		<div class="chat_wrapper">
				<chat-comment v-for="comment in commentsAll" :key="comment.id" :comment="comment" author=""></chat-comment>
		</div>
		<form class="comment_add" @submit.prevent="addComment">
			<input v-model="author" v-show="user === undefined" type="text" placeholder="Enter your name" id="chat_name" class="form-controll" :required="user === undefined"/>
			<textarea v-model="comment" class="form-controll" id="chat_comment" rows="1" placeholder="Type your comment" maxlength="220" required></textarea>
			<button type="submit" class="btn chat_button"><i class="fas fa-comment"></i></button>
		</form>
	</div>
</template>

<script>
	export default{
		props: ['comments', 'user', 'eventId'],
		data: function(){
			return {
				commentsAll: this.comments,
				comment: '',
				author: '',
			}
		},
		computed: {
			userId: function(){
				if(this.user !== undefined){
					return this.user.id;
				} else {
					return '';
				}
			},
			userName: function(){
				if(this.user !== undefined){
					return this.user.name;
				} else {
					return this.author;
				} 
			}
		},
		mounted: function(){
			this.scrollChatToBottom();
		},
		methods: {
			scrollChatToBottom: function(){
				let elem = document.querySelector(".chat_wrapper")
				elem.scrollTo(0,elem.offsetHeight+1000);
			},
			addComment(){
				if(this.comment != '' && this.userName != ''){
					axios({	
						method: 'post',
						url: '/event/'+ this.eventId + '/chat',
						data: {
							userId: this.userId,
							userName: this.userName,
							comment: this.comment
							}
						})
						.then((response)=>{
							this.getComments();
							this.comment = '';
							this.author = '';
						})
						.catch((error)=>{
							console.log(error);
						});
				}
			},
			getComments(){
				axios({
					method: 'get',
					url: '/event/'+ this.eventId + '/chat'
				})
				.then((response)=>{
					this.commentsAll = response.data;
					setTimeout(()=>{
						this.scrollChatToBottom();
					},500);
				})
				.catch((error)=>{
					console.log(error);
				})
			}
		}
	}
</script>

<style>

.chat_wrapper {
	
	flex-direction: column;
	max-height: 280px;
	overflow-y: auto;
}

.comment_add {
	display: flex;
	margin-top: 20px;
}

.comment_add > textarea {
	width: 100%;
}

.comment_add > button:hover {
	color: white;
}

.comment_add > button {
	background-color: #e54242;
	color: white;
	border-radius: 0 5px 5px 0;
}

#chat_name{
	margin-right: 20px;
}

#chat_comment{
	margin-right: 20px;
}

.chat_button:focus{
	color: white;
}


</style>