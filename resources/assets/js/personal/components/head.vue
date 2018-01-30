<template>
	<div class="edu-flex-head">
		<div class="edu-flex">
			<a v-if="islogin==0" @click="login">登录</a>
            <a v-if="islogin==1">{{username}}</a>
			|
			<a v-if="islogin==0" href="/register">注册</a>
            <a v-if="islogin==1" @click="logout">注销</a>
			|
			<a href="/">首页</a>
		</div>
	</div>
</template>
<script>
	module.exports={
        data(){
            return{
                islogin:0,
                username:'',
                userid:''
            }
        },
		methods:{
			test:function(){
				alert("dd")
			},
            login(){
                var url=window.location.href;
                url = url.substring(url.indexOf('/',7))
                //alert(url)
                self.location = 'prelogin?url='+url
            },
            logout(){
                axios.get('/logout').then(function(res){
                    if(res.data.status == 0){
                       // alert("logout")
                        location.replace(location.href)
                    }
                }).catch(function(err){})
            }
		},
        mounted(){
            var that = this
            axios.get('/userstatus').then(function(res){
                if(res.data.status == 0){
                    that.islogin = 1
                    that.username = res.data.user.name
                    that.userid = res.data.user.id
                } else if(res.data.status == 1){
                    that.guest = 0
                }
            }).catch(function(err){})

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
    .edu-flex>a{
        cursor:pointer;
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
