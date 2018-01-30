<template>
<div class="edu-flex">
	<div class="edu-banner">
		<transition-group tag='ul' class="edu-list" name="image">
			<!--li class="edu-movedown" key="-1">
				<img src="/banner1.jpg"/>
			</li-->
			<li v-for='(image,index) in img' :key='index' :class="{ 'edu-order-2':(index == mark) && order2 }" v-show="index == mark">
				<a><img :src="'/images/'+image"></a>
			</li>
		</transition-group>
		<div class="bullet">
			<span v-for='(item,index) in img.length' :class="{ 'span-active':index==mark}" @click="change(index)" :key="index"></span>
		</div>
		<!--div class="edu-nav">
			<a class="nav-active">精选课程</a><a>推荐课程</a><a>单独付费课程</a>
		</div-->
		<div class="edu-class-tab">
			<div class="edu-type">
				<a href="#">
					<img src="/images/type.jpg"/>
					<span class="edu-mask"></span>
				</a>
				<a href="#">
					<img src="/images/type.jpg"/>
					<span class="edu-mask"></span>
				</a>
				<a href="#">
					<img src="/images/type.jpg"/>
					<span class="edu-mask"></span>
				</a>
				<a href="#">
					<img src="/images/type.jpg"/>
					<span class="edu-mask"></span>
				</a>
			</div>
			<div class="edu-class">
				<div class="singal-class">
					<a href="#">
						<img src="/images/class.jpg"/>
						<span class="edu-class-mask"></span>
					</a>
					<div class="class-bottom">
						<img src="/images/avatar.jpg"/>
						<span>XXXX | XXX大学</span>
					</div>
				</div>

				<div class="singal-class">
					<a href="#">
						<img src="/images/class.jpg"/>
						<span class="edu-class-mask"></span>
					</a>
					<div class="class-bottom">
						<img src="/images/avatar.jpg"/>
						<span>XXXX | XXX大学</span>
					</div>
				</div>

				<div class="singal-class">
					<a href="#">
						<img src="/images/class.jpg"/>
						<span class="edu-class-mask"></span>
					</a>
					<div class="class-bottom">
						<img src="/images/avatar.jpg"/>
						<span>XXXX | XXX大学</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
</template>
<script>
	module.exports= {
		data:function(){
			return {
				mark:0,
				img:[
				'banner1.jpg',
				'banner2.jpg',
				'banner3.jpg',
				'banner4.jpg'
				],
				order2:false
			}
		},
		methods:{
			change:function(index){
				if(this.mark > index)
					this.order2 = true
				else
					this.order2 = false
				this.mark = index
			},
			autoPlay(){
				this.mark++
				this.order2 = false
				if(this.mark === 4){
					this.order2 = true
					this.mark = 0
					return
				}
			},
			play(){
				setInterval(this.autoPlay,5000)
			}
		},
		created(){
			//this.play()
		},
		mounted:function(){
		}
	}
</script>
<style scoped>
	.edu-flex{
		display:flex;
		flex:1 0 auto;
		flex-direction:column;
		justify-content:flex-start;
		align-items:center;
	}
	.edu-movedown{
		transform:translateY(100%);
	}
	.edu-banner{
		display:flex;
		width:100%;
		flex-direction:column;
		justify-content:center;
		align-items:center;
		position:relative;
	}
	.edu-nav{
		width:1280px;
		display:flex;
		flex-direction:row;
		justify-content:flex-start;
		align-items:center;
	}
	.edu-nav a{
		flex-grow:1;
		text-align:center;
		background-color:#FEFEFE;
		height:60px;
		position:relative;
		top:-52.2px;
		line-height:60px;
		cursor:pointer;
		border:1px solid rgba(0, 0, 0, 0.05);
		box-shadow:5px -5px 25px 0 rgba(0, 0, 0, 0.05) inset;
		-webkit-box-shadow:5px -5px 25px 0 rgba(0, 0, 0, 0.05) inset;
	}
	.edu-class-tab{
		display:flex;
		width:1280px;
		flex-direction:column;
		justify-content:flex-start;
		align-items:center;
	}
	.edu-type{
		width:100%;
		display:flex;
		flex-direction:row;
		justify-content:flex-start;
		align-items:center;
		flex-wrap:wrap;
	}
	.edu-type a{
		width:300px;
		height:200px;
		margin-left:10px;
		margin-right:10px;
	}
	.edu-type a img{
		width:100%;
		border-radius:5px;
	}
	.class-bottom{
		width:100%;
		height:80px;
		display:flex;
		flex-direction:row;
		justify-content:flex-start;
		align-items:center;

	}
	.class-bottom img{
		width:50px;
		border-radius:25px;
		margin:0 20px;
	}
	.edu-class{
		width:100%;
		display:flex;
		flex-direction:row;
		justify-content:flex-start;
		align-items:center;
		flex-wrap:wrap;
	}
	.singal-class{
		display:flex;
		flex-direction:column;
		justify-content:flex-start;
		align-items:center;
		width:620px;
		margin:0 10px 30px 10px;
	}
	.singal-class a{
		width:620px;
		height:350px;
		overflow:hidden;
	}
	.singal-class a img{
		width:100%;
		border-radius:5px 5px 0 0;
	}
	.nav-active{
		background-color:#D7D7D7!important;
	}
	.edu-flex-grow-1{
		flex-grow:1;
	}
	.edu-flex-grow-2{
		flex-grow:2;
	}
	.edu-left{
		margin-left:0!important;
	}
	.edu-right{
		margin-right:0!important;
	}
	.edu-ind-img{
		width:100%;
	}
	.edu-list{
		width:100%;
		list-style:none;
		margin:0;
		padding:0;
		display:flex;
		flex-direction:column;
		justify-content:flex-start;
		align-items:center;
		position:relative;
		overflow:hidden;
	}
	.edu-list li{
		width:100%;
		order:1;
	}
	.edu-list img{
		width:100%;
	}
	.edu-order-2{
		order:2!important;
	}
	.bullet{
		position:relative;
		top:-90px;
	}
	.bullet span{
		width:20px;
		height:20px;
		border-radius:50%;
		background-color:white;
		display:inline-block;
		margin-right:30px;
	}
	.span-active{
		background-color:gray!important;
	}
	.image-enter-active{
	}
	.image-leave-active{
	}
	.image-enter{
	}
	.image-leave{
	}
</style>
