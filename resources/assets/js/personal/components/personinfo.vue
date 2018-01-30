<template>
<div class="info-head">
    <div class="info-news-detail">
        <div class="info-news-title">
            <div>
                <div>
                    <span>姓名</span>
                </div>
                <div>
                    <input v-model:value="name"/>
                </div>
            </div>
            <div>
                <div>
                    <span>联系电话</span>
                </div>
                <div>
                    <input v-model:value="phone"/>
                </div>
            </div>
            <div>
                <div>
                    <span>QQ</span>
                </div>
                <div>
                    <input v-model:value="qq"/>
                </div>
            </div>
            <div>
                <div>
                    <span>微信</span>
                </div>
                <div>
                    <input v-model:value="wechat"/>
                </div>
            </div>
            <div>
                <div>
                    <span>邮箱</span>
                </div>
                <div>
                    <input v-model:value="email"/>
                </div>
            </div>
        </div>
        <div class="info-second-title">
            <button v-if="flag==0" @click="changeinfo" >修改</button>
            <button v-if="flag==1" @click="changeinfo" >增加</button>
        </div>
        <div class="info-third-title">
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['item'],
    data(){
        return{
            flag:0,
            name:'',
            phone:'',
            qq:'',
            wechat:'',
            email:''
        }
    },
    methods:{
        changeinfo(){
            if(!window.confirm("确认修改信息?")){
                return
            }
            var params={
                name:this.name,
                phone:this.phone,
                qq:this.qq,
                wechat:this.wechat,
                email:this.email
            }
            axios.post('/userinfo',params).then(function(res){
                if(res.data.status == 0){
                    alert("修改成功")
                }
                if(res.data.status == 1){
                    alert("修改失败")
                }
            }).catch(function(err){})
        }
    },
    mounted(){
        var that = this
        axios.get('/getuserinfo').then(function(res){
            if(res.data.status == 0){
                that.name = res.data.name
                that.phone = res.data.phone
                that.qq = res.data.qq
                that.wechat = res.data.wechat
                that.email = res.data.email
            }
            if(res.data.status == 1){
                that.flag=1
            }
        }).catch(function(err){})
    }
}
</script>
<style scoped>
@import './personinfo.css'
</style>
