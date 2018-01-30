<template>
<div class="detail-head">
    <div class="detail-news-detail">
        <div class="back-div">
            <span @click="backtolist">返回列表</span>
        </div>
        <div class="detail-news-title">
            <span style="font-size:20px">{{news.title}}</span>
        </div>
        <div class="detail-second-title">
            <span>发布日期:{{news.time}}</span>
            <span>浏览次数:{{news.count}}</span>
        </div>
        <div class="detail-third-title" ref="newsdetail">
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['item'],
    data(){
        return{
            news:{
                title:'',
                time:'',
                count:'',
                type:-1
            }
        }
    },
    methods:{
        backtolist(){
            window.location.href='/news?type='+this.type
        }
    },
    mounted(){
        var that = this
        this.$watch('item',function(newVal,oldVal){
            that.$refs.newsdetail.innerHTML=newVal.item.content
            that.news=newVal.item
            that.type=newVal.type
        })
        
    }

}
</script>
<style scoped>
@import './detail.css'
</style>
