<template>
<div class="head">
    <div class="news-detail">
        <div class="news-title">
            <div class="news-head">
                <span>文章标题</span>
                <input v-model:value="newstitle"/>
            </div>
        </div>
        <div class="second-title">
            <div class="editer">
                <div class="editer-tab">
                    <span class="tab-tool" @click="addpic">添加图片</span>
                    <div v-show="addpicflag" class="imgupload">
                        <input type="file" @change="picimg($event)" accept="image/*"/>
                        <span>{{picwords}}</span>
                    </div>
                </div>
                <div class="edit-area" contenteditable="true" ref="newsdetail"></div>
            </div>
        </div>
        <div class="third-title">
            <span>请选择发布板块</span>
            <select @change="selectchange" v-model:selected="selected">
                <option v-for="option in options" v-bind:value="option.value">{{option.text}}</option>
            </select>
            <!--button @click="test">测试</button-->
            <button @click="submit">发布</button>
        </div>
    </div>
</div>
</template>
<script>
export default{
    data(){
        return{
            newstitle:'',
            selected:0,
            addpicflag:false,
            picwords:'',
            tempimg:'',
            options:[
                { text:'科技创新',value:0},
                { text:'前沿技术',value:1},
                { text:'竞赛培训',value:2},
                { text:'成果转化',value:3},
                { text:'企业招聘',value:4},
                { text:'技术转让',value:5}
            ]
        }
    },
    methods:{
        picimg(event){
            var that = this
            var file = event.target.files[0]
            var form = new FormData()
            form.append('file',file)
            that.picwords = '上传中...';
            axios.post('/uploadpic',form,{
                header:{'Content-Type':'multipart/form-data'}
            }).then(function(res){
                if(res.data.status == 0){
                    that.tempimg = res.data.picurl
                    that.addimg()
                    that.picwords = '上传完成'
                    that.addpicflag=false
                }
            }).catch(function(err){})
            console.log(file)
        },
        submit(){
            var newstitle = $.trim(this.newstitle)
            if(newstitle == ''){
                alert('请填写新闻标题')
                return
            }
            var newsdetail = this.$refs.newsdetail.innerHTML
            if(newsdetail == ''){
                alert('请填写新闻内容')
                return
            }
            var params={
                title:newstitle,
                content:newsdetail,
                type:this.selected
            }
            console.log(params)
            var that = this
            axios.post('/submitnews',params).then(function(res){
                if(res.data.status == 0){
                    alert('发布成功')
                    that.clear() 
                }
            }).catch(function(err){})
        },
        clear(){
            this.slected = 0
            this.newstitle = ''
            this.$refs.newsdetail.innerHTML = ''
        },
        addpic(){
            this.addpicflag=!this.addpicflag
        },
        addimg(){
            var newsdiv = this.$refs.newsdetail
            newsdiv.innerHTML += '<div class="img-class"><img src="'+this.tempimg+'" /></div><br>'
        },
        selectchange(){
//            alert(this.selected)
        },
        test(){
            var newsdiv = this.$refs.newsdetail
            newsdiv.innerHTML += '<p>你好啊</p>'
            newsdiv.innerHTML += '<div class="img-class"><img src="/timg.jpg" /></div><br>'
            console.log(newsdiv.innerText)

        }
    }
}
</script>
<style scoped>
@import './addnews.css'
</style>

