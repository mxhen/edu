<template>
	<div class="edu-flex-head">
		<div class="edu-flex">
			<a v-if="guest == 0" @click="login">登录</a>
            <a v-if="guest == 1" href="/usercenter">{{username}}</a>
			|
			<a v-if="guest == 0" href="/register">注册</a>
            <a v-if="guest == 1" @click="logout">退出</a>
			|
			<a href="/page9">首页</a>
			|
			<a href="#">集团杂志</a>
			|
			<a href="#">联系我们</a>
		</div>
		<!--div class="edu-flex second-head">
			<a href="index" @click="test"></a>
			<div @click="test">
				<span>走进新大陆</span>
				<p>ABOUT US</p>
			</div>
			<div>
				<span>发展历程</span>
				<p>HISTORY</p>
			</div>
			<div>
				<span>荣誉资质</span>
				<p>HONOR</p>
			</div>
			<div>
				<span>合作与商机</span>
				<p>BUSINESS COOPERATION</p>
			</div>
			<div>
				<span>科技竞赛</span>
				<p>COMPETITION</p>
			</div>
		</div-->
	</div>
</template>
<script>
	module.exports={
        data(){
            return{
                guest:0,
                username:'',
                userid:-1
            }
        },
		methods:{
            logout:function(){
                axios.get('/logout').then(function(res){
                    if(res.data.status == 0){
                       // alert("logout")
                        location.replace(location.href)
                    }
                }).catch(function(err){})
            },
            login(){
                var url=window.location.href;
                url = url.substring(url.indexOf('/',7))
                //alert(url)
                self.location = 'prelogin?url='+url
            },
			test:function(){
				alert("dd")
			}
		},
        mounted(){
            var that = this
            axios.get('/userstatus').then(function(res){
                if(res.data.status == 0){
                    that.guest = 1
                    that.username = res.data.user
                    that.username = res.data.id
                } else if(res.data.status == 1){
                    that.guest = 0
                    that.username = res.data.user
                    that.username = res.data.id
                }
            }).catch(function(err){})
        },
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
	.second-head{
		justify-content:flex-start;
		padding-left:20%;
		padding-right:0;
		height:90px;
		background-color:#F5F5F5;
	}
	.second-head a{
		width:200px;
		height:100%;
		background-color:red;
		margin-right:30px;
	}
	.second-head1 span{
		border-left-color:#F0F0F0;
		border-right-color:white;
		border-width:0 1px 0 1px;
		border-style:solid;
		height:90px;
		width:110px;
		line-height:90px;
		text-align:center;
		float:left;
		cursor:pointer;
	}
	.second-head1 span:hover{
		color:#6F98CC;
	}
	.second-head div{
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-items:center;
		border-left-color:#F0F0F0;
		border-right-color:white;
		border-width:0 1px 0 1px;
		border-style:solid;
		height:90px;
		padding-right:10px;
		padding-left:10px;
		cursor:pointer;
		-moz-user-select: none;
		-khtml-user-select: none;
		user-select: none;
		
	}
	.second-head div:hover{
		color:#99ABB9;
		box-shadow:2px 2px 3px #C0C0C0 inset;
	}
	.second-head div span{
		user-select:none;
	}
	.second-head p{
		margin:0;
		font-size:10px;
		color:#99ABB9;
		user-select:none;
	}
	.edu-flex a{
		text-decoration:none;
		color:#888888;
		margin-left:10px;
		margin-right:10px;
	}
	.edu-flex a:hover{
		color:white;
	}
</style>
