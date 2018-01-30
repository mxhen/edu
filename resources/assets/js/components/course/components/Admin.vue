<template>
	<div class="edu-flex-admin">
        <div class="edu-sider">
            <div :class="{'edu-selected':select == 0}" @click="enterthis(0)">
                <span>教师管理</span>
            </div>
            <div :class="{'edu-selected':select == 1}" @click="enterthis(1)">
                <span>学生管理</span>
            </div>
            <div :class="{'edu-selected':select == 2}" @click="enterthis(2)">
                <span>人才库管理</span>
            </div>
            <div :class="{'edu-selected':select == 3}" @click="enterthis(3)">
                <span>管理员管理</span>
            </div>
            <div :class="{'edu-selected':select == 4}" @click="enterthis(4)">
                <span>企业管理</span>
            </div>
            <div :class="{'edu-selected':select == 5}" @click="enterthis(5)">
                <span>课程管理</span>
            </div>
            <div :class="{'edu-selected':select == 6}" @click="enterthis(6)">
                <span>资源管理</span>
            </div>

        </div>
        <component class="edu-main" @courseturn="course"  :is="currentView"></component>
	</div>
</template>
<script>
    import Center from './teacher/Center.vue'
    import Teacher from './admin/teacher.vue'
    import Student from './admin/student.vue'
    import Personnel from './admin/personnel.vue'
    import Admin from './admin/admin.vue'
    import Enterprise from './admin/enterprise.vue'
    import Course from './admin/course.vue'
    import Resourse from './admin/resourse.vue'
	export default{
        data(){
            return {
                select:-1,
                currentView:''
            }
        },
        components:{
            center:Center,
            teacher:Teacher,
            student:Student,
            personnel:Personnel,
            admin:Admin,
            enterprise:Enterprise,
            course:Course,
            resourse:Resourse

        },
        methods:{
            course(val){
            },
            enterthis(val){
                if(val == this.select)
                    return
                switch(val){
                    case 0:this.currentView = 'teacher';this.select=0;break
                    case 1:this.currentView = 'student';this.select=1;break
                    case 2:this.currentView = 'personnel';this.select=2;break
                    case 3:this.currentView = 'admin';this.select=3;break
                    case 4:this.currentView = 'enterprise';this.select=4;break
                    case 5:this.currentView = 'course';this.select=5;break
                    case 6:this.currentView = 'resourse';this.select=6;break
                }
            }
        }
	}
</script>
<style scoped>
    .edu-flex-admin{
        width:1280px;
        display:flex;
        flex-direction:row;
        border:1px solid gray;
        margin-top:20px;
    }
    .edu-sider{
        width:20%;
        min-height:720px;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
    }
    .edu-sider>div{
        width: 100%;
        height: 40px;
        line-height: 40px;
        background-color: #E7E9E7;
        border-width: 0 0 1px 0;
        border-style: solid;
        border-color: white;
        cursor:pointer;
    }
    .edu-sider>div:hover{
        background-color:gray;
    }
    .edu-selected{
        background-color:#9B9F9B!important;
        color:white;
    }
    .edu-sider>div>span{
        margin-left: 30px;
        font-size: 20px;
    }
    .edu-main{
        width:80%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
        align-self:start;
    }
</style>
