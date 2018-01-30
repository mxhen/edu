<template>
	<div class="edu-flex-head">
        <div class="edu-first-layer">
            <div>
                <p></p>
            </div>
            <div>
            </div>
        </div>
        <div class="edu-second-layer">
            <span><a href="/">首页</a></span>
            <span><a @click="showlist(0)">技能培训</a></span>
            <span><a @click="showlist(1)">竞赛</a></span>
            <span><a @click="showlist(2)">人才服务</a></span>
            <span><a @click="showlist(3)">技术转让</a></span>
            <span><a @click="showlist(4)">科技竞赛</a></span>
        </div>
		<!--div class="edu-flex">
			<a v-if="islogin==0" @click="login">登录</a>
            <a v-if="islogin==1" @click="center(username)">{{username}}</a>
			|
			<a v-if="islogin==0" href="/register">注册</a>
            <a v-if="islogin==1" @click="logout">注销</a>
			|
			<a href="/">首页</a>
		</div>
		<div class="edu-flex second-head">
			<a href="index" @click="test"></a>
			<div @click="showlist(0)">
				<span>技能培训</span>
				<p>SKILLS</p>
			</div>
			<div @click="showlist(1)">
				<span>竞赛</span>
				<p>COMPETITION</p>
			</div>
			<div @click="showlist(4)">
				<span>人才服务</span>
				<p>TALENTS</p>
			</div>
			<div @click="showlist(5)">
				<span>技术转让</span>
				<p>TECHNOLOGY</p>
			</div>
			<!--!--div>
				<span>科技竞赛</span>
				<p>COMPETITION</p>
			</div-->
		<!--/div-->
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
            center(val){
                if(val == 'admin'){
                    window.location.href='/admin'
                    return
                }
                else{
                    window.location.href='/center'
                }
            },
            showlist(val){
                if(val == 0){
                    window.location.href='/course'
                    return
                }
                if(val == 1){
                    window.location.href='/competition'
                    return
                }
                window.location.href='/news?type='+val
            },
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
            /*axios.get('/userstatus').then(function(res){
                if(res.data.status == 0){
                    that.islogin = 1
                    that.username = res.data.user.name
                    that.userid = res.data.user.id
                } else if(res.data.status == 1){
                    that.guest = 0
                }
            }).catch(function(err){})
            */
        }
	}
</script>
<style scoped lang="less">
@import './Header.less';
</style>
