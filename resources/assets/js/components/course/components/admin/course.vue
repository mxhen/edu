<template>
<div>
    <component class="course-component" @courseemit="switchview" :is="currentView"></component>
</div>
</template>
<style scoped>
.course-component{
    width:100%;
}
</style>
<script>
import center from './course/center.vue'
import course from './course/course.vue'
export default{
    data(){
        return {
            currentView:'center'
        }
    },
    components:{
        center:center,
        course:course
    },
    methods:{
        switchview(val){
            this.currentView = 'course'
        }
    }
}
</script>

