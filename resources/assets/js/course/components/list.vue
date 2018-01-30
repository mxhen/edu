<template>
<div class="head">
    <div class="news-detail">
        <div class="second-title">
            <div class="class-until">
                <div v-for="(ite,index) in items" class="singal-class">
                    <!--a @click="entercourse(ite.id)"-->
                    <a @click="getintd(index+1)" :class="{'class-selected':selected==index}">
                        <img :src="ite.imgurl"/>
                    </a>
                    <div class="class-bottom">
                        <span>{{ite.title}}</span>
                    </div>
                </div>
            </div>
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
            selected:0,
            items:[],
            itemgrp:[],
            pages:0,
            currentPage:-1,
        }
    },
    methods:{
        getintd(val){
            this.$emit('getint',val)
            this.selected=val-1
        },
        buythiscourse(val){
            var params = {
                course:val
            }
            var that = this
            axios.post('/buycourse',params).then(function(res){
                if(res.data.status == 0){
                    that.$emit('viewevent','detail',val)
                }
                if(res.data.status == 1){
                    alert(res.data.message)
                }
            }).catch(function(err){})
        },
        entercourse(val){
            var that=this
            axios.get('/userstatus?course='+val).then(function(res){
                if(res.data.status == 0){
                    if(res.data.user.role == 1){
                        alert('请以学生身份查看课程')
                        return
                    }
                    if(res.data.code == 1){
                        alert('请到个人中心填写个人信息')
                        return
                    }
                    if(res.data.user.role == 0){
                        if(res.data.course == 0){
                            if(confirm('您还未购买此课程，是否购买?')){
                                that.buythiscourse(val)
                            }else{
                                return
                            }
                        }
                        if(res.data.course == 1){
                            that.$emit('viewevent','detail',val)
                        }
                    }
                }else if(res.data.status == 1){
                    alert('未登录')
                    window.location.href='/prelogin?url='+'course'
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
        datadeal(item){
            this.items=[]
            this.itemgrp=[]
            var that = this
            var j=0
            var h=1
            var temp={}
            var temp2=[]
            for(var i=0;i<item.length;i++){
                temp2.push(item[i])
                j++;
                if(j==6 || i==item.length-1){
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
        },
        getclasslist(type){
            var that = this
            axios.get('/getclasslist?type='+type).then(function(res){
                    if(res.data.status == 0){
                        that.datadeal(res.data.item) 
                    }
                    if(res.data.status == 1){
                        alert(res.data.message)
                    }
            }).catch(function(err){
                alert('获取数据失败')     
            })
        }
    },
    activated(){
        if(this.item.update==1){
            this.getclasslist(this.item.type)
        }
    },
    mounted(){
        this.getclasslist(this.item.type)
    },
    watch:{
        item:function(newdata){
            if(newdata.update == 1)
                this.getclasslist(newdata.type)
        }
    }
}
</script>
<style scoped>
@import './list.css'
</style>
