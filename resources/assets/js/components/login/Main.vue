<template>
    <div class="edu-login">
        <div class="edu-padding">
            <span class="header">登录</span>
            <div>
                <span class="col-md-3">邮箱</span>
                <div class="col-md-7">
                    <input v-model:value="username"  class="form-control" />
                </div>
            </div>
            <div>
                <span class="col-md-3">密码</span>
                <div class="col-md-7">
                    <input v-model:value="passwd" class="form-control" type="password"/>
                </div>
            </div>
            <div>
                <span class="col-md-3">验证码</span>
                <div class="col-md-7">
                    <div class="col-md-3 vali">
                        <input v-model:value="code" class="form-control"/>
                    </div>
                    <img class="col-md-9 edu-img" @click="imgrefresh" :src="img"/>
                </div>
            </div>
            <div>
                <div class="col-md-7 col-md-offset-3 vali">
                    <button class="btn btn-primary" @click="login">登录</button>
                    <a href="/register">注册</a>
                    <a href="/password/reset">忘记密码?</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                img:'',
                username:'',
                passwd:'',
                code:''
            }
        },
        methods:{
            imgrefresh(){
                this.img = '/captcha'+'?random='+new Date()
            },
            login(){
                var params={
                    username:this.username,
                    passwd:this.passwd,
                    code:this.code
                }
                var that = this
                axios.post('/login',params).then(function(res){
                        if(res.data.status == 0){
                            self.location = res.data.url
                        } else {
                            alert(res.data.message)
                            that.code = ''
                            that.imgrefresh()
                        }
                }).catch(function(err){})
            }
        },
        mounted(){
            this.img='/captcha'
        }
}
</script>
<style scoped>
.edu-login{
    width:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
.edu-padding{
    width:500px;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:center;
    font-size:20px;
    border:1px solid #E5EDF1;
    border-radius:5px;
    background-color:white;
    margin-top:100px;
}
.edu-padding>div{
    width:100%;
    margin-bottom:20px;
}
.vali{
    padding:0;
}
.vali>a{
    margin-left:20px;
}
.edu-vali{
    width:auto!important;
}
.header{
    align-self:flex-start;
    border-width:0 0 1px 0;
    border-style:solid;
    border-color:#E5EDF1;
    width:100%;
    padding:10px 0 5px 10px;
    margin-bottom:20px;
}
.edu-img{
    cursor:pointer;
}
</style>
