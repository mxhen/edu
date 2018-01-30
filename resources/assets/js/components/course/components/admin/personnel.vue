<template>
<div>
    <component class="personnel-component" @personnelemit="switchview" :is="currentView"></component>
</div>
</template>
<style scoped>
.personnel-component{
    width:100%;
}
</style>
<script>
import center from './personnel/center.vue'
import personnel from './personnel/personnel.vue'
export default{
    data(){
        return {
            currentView:'center'
        }
    },
    components:{
        center:center,
        personnel:personnel
    },
    methods:{
        switchview(val){
            this.currentView = 'personnel'
        }
    }
}
</script>
