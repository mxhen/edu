<template>
    <div class="edu-login">
        <div class="edu-padding">
            <span class="header">注册</span>
            <div :class="{'has-error':userflag==1}">
                <span class="col-md-3">用户名</span>
                <div class="col-md-7">
                    <input v-model:value="username"  class="form-control" />
                </div>
            </div>
            <div :class="{'has-error':emailflag==1}">
                <span class="col-md-3">邮箱</span>
                <div class="col-md-7">
                    <input type="email" v-model:value="email"  class="form-control" />
                </div>
            </div>
            <div>
                <span class="col-md-3">密码</span>
                <div class="col-md-7">
                    <input v-model:value="passwd" class="form-control" type="password"/>
                </div>
            </div>
            <div :class="{'has-error':passwdflag==1}">
                <span class="col-md-3">确认密码</span>
                <div class="col-md-7">
                    <input v-model:value="passwdconf" class="form-control" type="password"/>
                </div>
            </div>
            <div>
                <span class="col-md-3">用户类型</span>
                <div class="col-md-7">
                    <select v-model:selected="selected" class="form-control">
                        <option v-for="option in options" v-bind:value="option.value">{{option.text}}</option>
                    </select>
                </div>
            </div>
            <div>
                <span class="col-md-3">验证码</span>
                <div class="col-md-7">
                    <div class="col-md-3 vali" :class="{'has-error':codeflag==1}">
                        <input v-model:value="code" class="form-control"/>
                    </div>
                    <img class="col-md-9 edu-img" @click="imgrefresh" :src="img"/>
                </div>
            </div>
            <div>
                <div class="col-md-7 col-md-offset-3 vali">
                    <button class="btn btn-primary" @click="register">注册</button>
                    <a href="/login">登录</a>
                    <a href="/password/reset">找回密码?</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                selected:0,
                img:'',
                username:'',
                userflag:0,
                email:'',
                emailflag:0,
                passwd:'',
                passwdflag:0,
                passwdconf:'',
                code:'',
                options:[
                    { text:'学生', value:0},
                    { text:'老师',value:1}
                ]
            }
        },
        methods:{
            register(){
                var username = $.trim(this.username)
                if(username==''){
                    this.userflag=1
                    this.username=''
                    alert('用户名不能为空')
                    return
                }
                if(!this.email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)){
                    this.emailflag=1
                    this.email=''
                    alert('邮箱格式不正确')
                    return
                }
                if(this.passwd==''){
                    alert('邮箱不能为空')
                        return
                }
                if(this.passwd != this.passwdconf){
                    this.passwdflag=1
                    this.passwdconf=''
                    alert('两次密码不匹配')
                    return
                }
                if(this.code == ''){
                    this.codeflag=1
                    alert('请输入验证码')
                    return
                }
                this.userflag=0
                this.emailflag=0
                this.passwdflag=0
                this.codeflag=0
                var params={
                    username:this.username,
                    passwd:this.passwd,
                    email:this.email,
                    type:this.selected,
                    code:this.code
                }
                var that = this
                axios.post('/register',params).then(function(res){
                    if(res.data.status == 0){
                        alert('注册成功')
                        self.location = res.data.url
                    }else if(res.data.status == 1){
                        if(res.data.status2==1){
                            that.userflag=1
                            alert('用户名已存在')
                        }else if(res.data.status2==2){
                            that.emailflag=1
                            alert('此邮箱已注册')
                        }else if(res.data.status2==3){
                            that.codeflag=1
                            that.code=''
                            that.imgrefresh()
                            alert('验证码错误')
                        }
                    }
                }).catch(function(err){})
            },
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
