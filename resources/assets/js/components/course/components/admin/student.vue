<template>
<div>
    <component class="stu-component" @studentemit="switchview" :is="currentView"></component>
</div>
</template>
<style scoped>
.stu-component{
    width:100%;
}
</style>
<script>
import center from './students/center.vue'
import student from './students/student.vue'
export default{
    data(){
        return {
            currentView:'center'
        }
    },
    components:{
        center:center,
        student:student
    },
    methods:{
        switchview(val){
            this.currentView = 'student'
        }
    }
}
</script>
