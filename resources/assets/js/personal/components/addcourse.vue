<template>
<div class="addcourse-head">
    <div class="addcourse-news-detail">
        <div class="addcourse-news-title">
            <button @click="backtocourse">返回</button>
            <div class="addcourse-news-head">
                <span>课程题目</span>
                <input v-model:value="coursetitle"/>
            </div>
            <div class="addcourse-news-head">
                <span>课程描述</span>
                <div class="addcourse-edit-area" contenteditable="true" ref="courseabstrate"></div>
            </div>
            <div class="addcourse-news-head">
                <span>添加封面图片(建议上传封面为300k以下，分辨率400X300)</span>
                <input type="file" @change="picimg($event)" id="upinput" accept="image/*"/>
                <span>{{picwords}}</span>
                <img v-if="imgurl!=null" :src="imgurl"/>
                <button v-if="imgurl!=null" @click="reset" >重新选择</button>
            </div>
        </div>
        <div class="addcourse-second-title">
            <select v-model:selected="selected">
                <option v-for="option in options" v-bind:value="option.value">{{option.text}}</option>
            </select>
        </div>
        <div class="addcourse-third-title">
            <button @click="submit">发布</button>
        </div>
    </div>
</div>
</template>
<script>
export default{
    data(){
        return{
            selected:0,
            coursetitle:'',
            courseabstrate:'',
            picwords:'',
            imgurl:null,
            options:[
                { text:'理论类',value:0},
                { text:'技能类',value:1},
            ]
        }
    },
    methods:{

        reset(){
            this.imgurl = null
            $('#upinput').val("")
            this.picwords = ''
        },
        backtocourse(){
            this.$emit('viewevent','list',1)
        },
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
                    that.imgurl = res.data.picurl
                    that.picwords = '上传完成'
                }
                if(res.data.status == 1){
                    alert(res.data.message)
                }
            }).catch(function(err){})
            console.log(file)
        },
        submit(){
            var coursetitle = $.trim(this.coursetitle)
            if(coursetitle == ''){
                alert('请填写课程名称')
                return
            }
            var courseabstrate = this.$refs.courseabstrate.innerHTML
            if(courseabstrate == ''){
                alert('请填写课程简介')
                return
            }
            if(this.imgurl == null){
                alert('请选择图片')
                return
            }
            var params={
                title:coursetitle,
                abstrate:courseabstrate,
                imgurl:this.imgurl,
                type:this.selected
            }
            console.log(params)
            var that = this
            axios.post('/submitcourse',params).then(function(res){
                if(res.data.status == 0){
                    alert('发布成功')
                    that.clear() 
                }
            }).catch(function(err){})
        },
        clear(){
            this.coursetitle = ''
            this.$refs.courseabstrate.innerHTML = ''
            this.imgurl = null
            $('#upinput').val("")
            this.picwords = ''
        },
    }
}
</script>
<style scoped>
@import './addcourse.css'
</style>

