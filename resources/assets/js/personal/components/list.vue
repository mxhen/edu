<template>
<div class="clist-head">
    <div class="clist-news-detail">
        <div class="clist-news-title" v-if="item.role==1">
            <button @click="addcourse">新增课程</button>
        </div>
        <div class="clist-second-title">
            <div class="clist-class-until">
                <div v-for="item in items" class="clist-singal-class">
                    <a @click="detail(item.id)">
                        <img :src="item.imgurl"/>
                    </a>
                    <div class="clist-class-bottom">
                        <span>{{item.title}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clist-third-title">
            <span @click="firstpage">首页</span><span @click="preview">上一页</span><span @click="next">下一页</span><span @click="lastpage">末页</span><span>第{{currentPage}}/{{pages}}页</span>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['item'],
    data(){
        return{
            items:[],
            itemgrp:[],
            pages:0,
            currentPage:-1,
        }
    },
    methods:{
        detail(id){
            this.$emit('viewevent','detail',id)
        },
        addcourse(){
            //0刷新
            var that = this
            axios.get('/userstatus').then(function(res){
                if(res.data.code == 1){
                    alert('请填写个人信息后再进行操作')
                    return
                }
                else
                {
                    that.$emit('viewevent','addcourse',0)
                }
            }).catch(function(err){})
        },
        next(){
            if(this.currentPage+1>this.pages){
                alert('没有更多页')
                    return
            }
            this.items=this.itemgrp[this.currentPage].item
                this.currentPage++
        },
        preview(){
            if(this.currentPage-1<=0){
                alert('已经是第一页')
                    return
            }
            this.items=this.itemgrp[this.currentPage-2].item
                this.currentPage--
        },
        firstpage(){
            if(this.pages == 0)
                return
                    this.items=this.itemgrp[0].item
                    this.currentPage=1
        },
        lastpage(){
            if(this.pages==0)
                return
                    this.items=this.itemgrp[this.pages-1].item
                    this.currentPage=this.pages
        },
        datadeal(){
            this.items=[]
            this.itemgrp=[]
            var that = this
            var j=0
            var h=1
            var temp={}
            var temp2=[]
            for(var i=0;i<this.item.item.length;i++){
                temp2.push(this.item.item[i])
                j++;
                if(j==6 || i==this.item.item.length-1){
                    temp={
                        page:h,
                        item:temp2
                    }
                    that.itemgrp.push(temp)
                    var temp={}
                    var temp2=[]
                    j=0
                    h++
                }
            }
            that.pages=h-1
            if(h-1!=0)
                that.items = that.itemgrp[0].item
            that.currentPage = 1
        }
    },
    activated(){
        if(this.item.update == 1){
            this.datadeal()
        }
    },
    mounted(){
        this.datadeal()
        this.flag=1
    }
}
</script>
<style scoped>
@import './list.css'
</style>
