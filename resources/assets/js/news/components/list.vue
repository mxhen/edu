<template>
<div class="head">
    <div class="news-detail">
        <div class="news-title">
            <span style="font-size:20px">{{title}}</span>
        </div>
        <div class="second-title">
            <p v-for="ite in items" @click="showdetail(ite.id)">{{ite.time}} {{ite.title}}</p>
        </div>
        <div class="third-title">
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
            title:'',
            itemgrp:[],
            pages:0,
            currentPage:-1
        }
    },
    methods:{
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
            this.items=this.itemgrp[this.currentPage-1].item
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
        showdetail(val){
            window.location.href='/news?page='+val
        }
    },
    mounted(){
        var that = this
        this.$watch('item',function(newVal,oldVal){
            that.title = newVal.type
            var j=0
            var h=1
            var temp={}
            var temp2=[]
            for(var i=0;i<newVal.item.length;i++){
                temp2.push(newVal.item[i])
                j++;
                if(j==11 || i==newVal.item.length-1){
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
        console.log(that.itemgrp)
        })
        
    }
}
</script>
<style scoped>
@import './list.css'
</style>
