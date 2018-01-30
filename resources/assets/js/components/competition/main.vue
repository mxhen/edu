<template>
<div class="edu-flex">
	<div class="edu-class">
        <div class="edu-tab">

        </div>
		<component v-bind:is="currentView"></component>
	</div>
</div>
</template>
<script>
import comlist from './comlist.vue'
import newslist from './newslist.vue'
import competition from './competition'
export default {
	data:function(){
		return {
			currentView:'newslist',
            select:0
		}
	},
	components:{
		//course:require('./Course.vue')
        comlist:comlist,
        newslist:newslist,
        competition:competition
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
        var that = this
        Bus.$on('changeView',function(view){
            that.currentView = view         
        })
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
        margin-top:60px;
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
</style>
