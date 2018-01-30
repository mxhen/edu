<template>
<div class="course-head">
    <div class="course-news-detail">
        <div class="course-news-title">
            <select @change="selectchange" v-model:selected="selected">
                <option v-for="option in options" v-bind:value="option.value">{{option.text}}</option>
            </select>
        </div>
        <div class="course-second-title">
            <div v-for="ite in items">
                <p>{{ite.teacher}} {{ite.title}}</p>
                <button @click="deletenews(ite.id)">删除</button>
            </div>
        </div>
        <div class="course-third-title">
            <span @click="firstpage">首页</span><span @click="preview">上一页</span><span @click="next">下一页</span><span @click="lastpage">末页</span><span>第{{currentPage}}/{{pages}}页</span>
        </div>
    </div>
</div>
</template>
<script>
export default{
    data(){
        return{
            selected:0,
            options:[
                { text:'理论类',value:0},
                { text:'技能类',value:1},
            ],
            items:[],
            title:'',
            itemgrp:[],
            pages:0,
            currentPage:-1,
            itemorigin:null
        }
    },
    methods:{
        addnews(){
            this.$emit('viewevent','addnews')
        },
        deletenews(val){
            var that = this
            if(!window.confirm('你确定要删除吗?')){
                return
            }
            axios.get('/deletecourse?courseid='+val).then(function(res){
                if(res.data.status == 0){
                    that.selectchange()
                }
                if(res.data.status == 1){
                    alert(res.data.message)
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
        selectchange(){
            this.itemgrp=[]
            this.items=[]
            var params={
                type:this.selected,
                page:-1
            }
            this.getinfo(params)
        },
        getinfo(params){
            var that = this
            axios.post('/getcourselist',params).then(function(res){
                if(res.data.status == 0){
                    that.itemorigin = {
                        item:res.data.item
                    }
                }
            }).catch(function(err){})
        }
    },
    mounted(){
        var that = this
        var params={
            type:0,
            page:-1
        }
        this.getinfo(params)
        this.$watch('itemorigin',function(newVal,oldVal){
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
@import './courselist.css'
</style>
