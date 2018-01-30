<template>
	<div class="edu-flex-head">
		<div class="edu-flex">
			<a href="/">首页</a>
			|
			<a href="#">集团首页</a>
			|
			<a href="#">联系我们</a>
		</div>
	</div>
</template>
<script>
	module.exports={
		methods:{
			test:function(){
				alert("dd")
			}
		}
	}
</script>
<style scoped>
	.edu-flex-head{
		width:100%;
		display:flex;
		flex-direction:column;
		justify-content:flex-start;
		align-items:center;
		flex:0 0 auto;
	}
	.edu-flex{
		width:80%;
		display:flex;
		flex-direction:row;
		justify-content:flex-end;
		align-items:center;
		padding-right:20%;
		height:35px;
		background-color:#202020;
		color:#888888;
	}
</style>
