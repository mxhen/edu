<template>
<div class="edu-flex">
	<div class="edu-banner">
        <img src='/images/newscenter.jpg'/>
	</div>
	<div class="edu-content">
        <div class="edu-news-sider">
            <div class="edu-news-list">
                <span class="news-center-1">新闻中心</span>
                <span class="news-2" :class="{'edu-news-select':selected==0}" @click="showlist(0)">科技创新</span>
                <span class="news-2" :class="{'edu-news-select':selected==1}" @click="showlist(1)">前沿技术</span>
                <span class="news-2" :class="{'edu-news-select':selected==2}" @click="showlist(2)">竞赛培训</span>
                <span class="news-2" :class="{'edu-news-select':selected==3}" @click="showlist(3)">成果转化</span>
                <span class="news-2" :class="{'edu-news-select':selected==4}" @click="showlist(4)">企业招聘</span>
                <span class="news-2" :class="{'edu-news-select':selected==5}"  @click="showlist(5)">技术转让</span>
            </div>
        </div>
        <div class="edu-news-component">
            <div class="edu-news-head">
                <span>新闻详情</span>
                <div>
                </div>
            </div>
            <keep-alive include="list">
                <component :is="currentView" @viewevent="viewevent" :item="items">
                </component>
            </keep-alive>
        </div>
	</div>
</div>
</template>
<script>
    import newslist from './components/list.vue'
    import newsdetail from './components/detail.vue'
	export default {
		data(){
            return {
                selected:-1,
                currentView:'newslist',
                items:null
            }
		},
        components:{newslist,newsdetail},
		methods:{
            showlist(val){
                window.location.href='/news?type='+val
            },
            viewevent(val){
                this.currentView = val
            }
		},
		created(){
		},
		mounted:function(){
            var url = window.location.href
            var urls = url.split('?')
            var type = 0
            var page = -1
            if(urls.length != 1){
                urls = urls[1].split('=')
                if(urls.length!=2)
                    return
                if(urls[0]=='page'){
                    type = -1
                    page = urls[1]
                    this.currentView = 'newsdetail'
                }
                if(urls[0] == 'type'){
                    type = urls[1]
                }
            }
            var params={
                type:type,
                page:page
            }
            var that = this
            axios.post('/getnewsinfo',params).then(function(res){
                    if(res.data.status == 0){
                        that.items={
                            item:res.data.item,
                            type:res.data.type
                        }
                        that.selected = res.data.type1
                    }
            }).catch(function(err){})
            console.log(urls)
		},
		watch:{
        }
	}
</script>
<style scoped>
@import './main.css'
</style>
