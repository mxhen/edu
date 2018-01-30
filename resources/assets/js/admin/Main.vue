<template>
<div class="edu-flex">
	<div class="edu-content">
        <div class="edu-news-sider">
            <div class="edu-news-list">
                <span class="news-center-1">管理中心</span>
                <span class="news-2"  :class="{'select':selected==0}" @click="sectionswitch(0)">新闻管理</span>
                <span class="news-2"  :class="{'select':selected==1}" @click="sectionswitch(1)">课程管理</span>
                <span class="news-2"  :class="{'select':selected==2}" @click="sectionswitch(2)">老师管理</span>
                <span class="news-2"  :class="{'select':selected==3}" @click="sectionswitch(3)">学生管理</span>
                <span class="news-2"  :class="{'select':selected==4}" @click="sectionswitch(4)">竞赛管理</span>
            </div>
        </div>
        <div class="edu-news-component">
            <div class="edu-news-head">
                <span>详细信息</span>
                <div>
                </div>
            </div>
            <component :is="currentView" @viewevent="switchview">
            </component>
        </div>
	</div>
</div>
</template>
<script>
    import newslist from './components/list.vue'
    import newsdetail from './components/detail.vue'
    import newsmanager from './components/newsmanager.vue'
    import addnews from './components/addnews.vue'
    import courselist from './components/courselist.vue'
	export default {
		data(){
            return {
                selected:0,
                currentView:'newsmanager'
            }
		},
        components:{newslist,newsdetail,newsmanager,addnews,courselist},
		methods:{
            sectionswitch(val){
                switch(val){
                    case 0:this.currentView='newsmanager';this.selected=0;break
                    case 1:this.currentView='courselist';this.selected=1;break
                }
            },
            switchview(val){
                this.currentView = val
            }
		},
		created(){
		},
		mounted:function(){
		},
		watch:{
        }
	}
</script>
<style scoped>
@import './main.css'
</style>
