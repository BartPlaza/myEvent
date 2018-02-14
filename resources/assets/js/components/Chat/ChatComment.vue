<template>
	<div class="comment">
		<div class="comment_author">
			<i class="fas fa-user"></i>
		</div>
		<span></span>
		<div class="comment_body">
			<span>{{comment.body}}</span></br>
			<span>{{comment.created_at}}</span>
		</div>
	</div>
</template>

<script>
export default {
	props: ['comment']
}
</script>

<style>
.comment{
	display:flex;
	align-items: flex-end;
	margin-bottom: 10px;
}

.comment:nth-child(odd){
	flex-direction: row;
}

.comment:nth-child(odd) > span{
	border-right:10px solid lightgrey;
	border-bottom:10px solid transparent;
	border-top:10px solid transparent;
}

.comment:nth-child(odd) > .comment_body{
	border-radius: 10px 10px 10px 0;
}

.comment:nth-child(even){
	flex-direction: row-reverse;
}

.comment:nth-child(even) > span{
	border-left:10px solid lightgrey;
	border-bottom:10px solid transparent;
	border-top:10px solid transparent;
}

.comment:nth-child(even) > .comment_body{
	border-radius: 10px 10px 0 10px;
}

.comment_author{
	width:50px;
	height:50px;
	background-color: grey;
	border-radius: 25px;
	display:flex;
	justify-content: center;
	align-items: center;
	font-size: 25px;
	color: white;
}
.comment_body{
	background-color: lightgrey;
	padding: 5px;
	max-width: 70%;
}

.comment_body:nth-child(odd){
	
}
.comment_body:nth-child(even){
	
}

</style>