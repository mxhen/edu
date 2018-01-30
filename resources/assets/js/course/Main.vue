<template>
<div class="edu-flex">
	<div class="edu-banner">
        <div>
            <a href="/">首页</a>
            >
            <span>技能培训</span>
        </div>
	</div>
	<div class="edu-content">
        <div class="edu-news-sider">
            <div class="edu-news-list">
                <span class="news-center-1">技能培训</span>
                <span class="news-2" :class="{'news-select':select==0}" @click="choosetype(0)">培训产品</span>
                <span class="news-2" :class="{'news-select':select==1}" @click="choosetype(1)">教育产品</span>
                <span class="news-2" :class="{'news-select':select==2}" @click="choosetype(-1)">院校产品</span>
                <span class="news-2" :class="{'news-select':select==3}" @click="choosetype(-1)">定向产品</span>
            </div>
        </div>
        <div class="edu-news-component">
            <keep-alive include="list">
                <component :is="currentView" @viewevent="viewevent" @getint="getint" :item="type">
                </component>
            </keep-alive>
            <introduce :intitem="intitem"></introduce>
        </div>
	</div>
</div>
</template>
<script>
    import list from './components/list.vue'
    import detail from './components/detail.vue'
    import introduce from './components/introduce.vue'
	export default {
		data(){
            return {
                currentView:'list',
                select:0,
                type:{
                    type:0,
                    update:0
                },
                intitem:{}
            }
		},
        components:{list,detail,introduce},
		methods:{
            getint(val){
                var that = this
                axios.get('/json/'+val+'.json').then(function(res){
                    that.intitem=res.data         
                })
            },
            choosetype(val){
                if(this.select == val)
                    return
                this.select = val
                this.type={
                    type:val,
                    update:1
                },
                this.currentView='list'
            },
            viewevent(view,id){
                if(view == 'list'){
                    this.type={
                        type:-1,
                        update:0
                    }
                    this.currentView = view
                    return
                }
                this.currentView = view
                this.type=id
            }
		},
		created(){
		},
		mounted(){
            this.getint(1)
		},
		watch:{
        }
	}
</script>
<style scoped lang="less">
@import './main.less';
</style>
