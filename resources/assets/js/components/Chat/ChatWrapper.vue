<template>
	<div class="panel-body">
		<div class="chat_wrapper">
				<chat-comment v-for="comment in comments" :key="comment.id" :comment="comment"></chat-comment>
		</div>
		<div class="comment_add">
			<textarea class="form-controll" rows="1" placeholder="Type your comment" maxlength="220"></textarea>
			<button class="btn"><i class="fas fa-comment"></i></button>
		</div>
	</div>
</template>

<script>
	export default{
		props: ['comments'],
		mounted: function(){
			let elem = document.querySelector(".chat_wrapper")
			console.log(elem.scrollTop);
			console.log(elem.offsetHeight);
			elem.scrollTo(0,elem.offsetHeight+100);
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
</style>