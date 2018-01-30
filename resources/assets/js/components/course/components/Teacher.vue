<template>
	<div class="edu-flex-student">
        <div class="edu-sider">
            <div class="edu-student">
                <span class="edu-title">我的名片</span>
                <img src="/images/avatar.jpg"/>
                <span>XXXXX</span>
                <p>XXXXXX XXXXXX lXXXXXXX XXXXXXXXXXXXXXXXXXX</p>
            </div>
            <div class="edu-infos">
                <div>
                    <span>学校:</span>
                    <span>XXXXX大学</span>
                </div>
                <div>
                    <span>QQ:</span>
                    <span>1111111111</span>
                </div>
                <div>
                    <span>邮箱:</span>
                    <span>xxxxxxxx@163.com</span>
                </div>
            </div>
        </div>
        <component class="edu-main" @courseturn="course"  :is="currentView"></component>
	</div>
</template>
<script>
    import Center from './teacher/Center.vue'
    import Course from './teacher/Course.vue'
	export default{
        data(){
            return {
                currentView:'center'
            }
        },
        components:{
            center:Center,
            course:Course
        },
        methods:{
            course(val){
                this.currentView='course'
            }
        }
	}
</script>
<style scoped>
    .edu-flex-student{
        width:1280px;
        display:flex;
        flex-direction:row;
        border:1px solid gray;
        margin-top:20px;
    }
    .edu-sider{
        width:30%;
        min-height:720px;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
    }
    .edu-main{
        width:70%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
        align-self:start;
    }
    .edu-student{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
    }
    .edu-student p{
        word-break:break-all;
        width:80%;
    }
    .edu-student img{
        width:40%;
        margin-top:80px;
        border-radius:50%;
        margin-bottom:20px;
    }
    .edu-title{
        width:calc(100% - 20px);
        height:50px;
        background-color:#E7E9E7;
        line-height:50px;
        font-size:20px;
        font-weight:800;
        padding-left:20px;
    }
    .edu-infos{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
        border-width:1px 0 0 0;
        border-style:solid;
        border-color:gray;
    }
    .edu-infos>div{
        margin:20px 0 0 40px;
    }
    </style>
