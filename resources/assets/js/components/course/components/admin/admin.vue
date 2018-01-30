<template>
<div>
    <component class="admin-component" @adminemit="switchview" :is="currentView"></component>
</div>
</template>
<style scoped>
.admin-component{
    width:100%;
}
</style>
<script>
import center from './admin/center.vue'
import admin from './admin/admin.vue'
import addadmin from './admin/addadmin.vue'
export default{
    data(){
        return {
            currentView:'center'
        }
    },
    components:{
        center:center,
        admin:admin,
        addadmin:addadmin
    },
    methods:{
        switchview(val){
            this.currentView = 'addadmin'
        }
    }
}
</script>
