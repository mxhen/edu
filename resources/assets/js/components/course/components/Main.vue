<template>
<div class="edu-flex">
	<div class="edu-class">
        <div class="edu-tab">
            <span :class="{'edu-tab-selected':select == 0}" @click="selected(0)">学生</span><span @click="selected(1)" :class="{'edu-tab-selected':select == 1}">老师</span><span @click="selected(2)" :class="{'edu-tab-selected':select == 2}">管理员</span><span @click="selected(3)" :class="{'edu-tab-selected':select == 3}">course</span>

        </div>
		<component v-bind:is="currentView"></component>
	</div>
</div>
</template>
<script>
import Course from './Course.vue'
import Student from './Student.vue'
import Teacher from './Teacher.vue'
import Admin from './Admin.vue'
export default {
	data:function(){
		return {
			currentView:'student',
            select:0
		}
	},
	components:{
		//course:require('./Course.vue')
		course:Course,
        student:Student,
        teacher:Teacher,
        admin:Admin
	},
	methods:{
        selected(val){
            if(this.select == val)
                return
            this.select=val
            if(val == 0){
                this.currentView = 'student'
                    return
            }
            if(val == 1){
                this.currentView = 'teacher'
                    return
            }
            if(val == 2){
                this.currentView = 'admin'
                    return
            }
            if(val == 3){
                this.currentView = 'course'
                    return
            }

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
		width:100%;
		display:flex;
		flex:1 0 auto;
		flex-direction:column;
		justify-content:flex-start;
		align-items:center;
	}
    .edu-class{
        width:1280px;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
    }
    .edu-tab{
        height:30px;
        margin-top:30px;
    }
    .edu-tab>span{
        background-color:gray;
        color:white;
        cursor:pointer;
        font-size:20px;
        padding:0 3px 0 3px;
    }
    .edu-tab-selected{
        background-color:blue!important;
    }
</style>
