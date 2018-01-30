<template>
<div class="course-head">
    <div class="course-news-detail">
        <div class="course-news-title">
            <button @click="backtolist">返回</button>
            <span style="font-size:20px;margin-left:60px">{{title}}</span>
        </div>
        <div class="course-second-title">
            <span>{{teacher}}</span>
        </div>
        <div class="course-classes">
            <span v-for="(item,index) in items" :class="{'course-selected':selected==index}" @click="showclass(item.videourl,item.homework,item.owner,index)">{{index+1}}</span>
        </div>
        <div v-if="videoflag == 1" class="course-third-title">
            <video controls="controls" :src="'/videos/'+videourl" autoplay="autoplay">
                <source :src="'/videos/'+videourl" type="video/mp4"/>
            </video>
        </div>
        <div v-if="videoflag == 1" class="course-btn-grp">
            <label @click="download">下载作业</label>
            <label @click="labelclick" for="file">交作业</label>
            <label v-if="submitflag==1" @click="submit">提交</label>
            <div class="form-group " id="aetherupload-wrapper">
                <label hidden>上传作业(压缩包格式)</label>
                <div class="controls" >
                    <input hidden type="file" id="file" name="input2" onchange="aetherupload(this,'file').upload()"/>
                    <div class="progress " style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
                        <div id="progressbar" style="background:blue;height:6px;width:0;"></div>
                    </div>
                    <span style="font-size:12px;color:#aaa;" id="output"></span>
                    <input type="hidden" name="file2" id="savedpath" >
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['item'],
    data(){
        return {
            items:[],
            videourl:'',
            videoflag:0,
            selected:-1,
            title:'',
            teacher:'',
            homework:'',
            submitflag:0,
            course:-1
        }
    },
    methods:{
        labelclick(){
            $("input[name='input2']").removeAttr('disabled')
            this.submitflag=1
        },
        submit(){
            var homework=$("input[name='file2']").val()
            if(homework=='' || homework== undefined)
            {
                alert('请先选择作业压缩包')
                return
            }
            var params={
                homework:homework,
                course:this.course
            }
            axios.post('/uploadhomework',params).then(function(res){
                        if(res.data.status == 0){
                            alert('提交作业成功')
                        }
                    }).catch(function(err){})
        },
        download(){
            if(this.homework == ''|| this.homework==null){
                alert('课程没有作业')
                return
            }
            window.location.href='/download/'+Base64.encode(this.homework)
        },
        showclass(video,homework,course,index){
            this.course=course
            this.selected=index
            this.videoflag=1
            this.videourl=video
            this.homework=homework
            this.submitflag=0
            $("input[name='file2']").val('')
            $("input[name='input2']").val('')
            $("input[name='input2']").removeAttr('disabled')
            $('#progressbar').css('width',0)
            $('#output').text('')
        },
        backtolist(){
            this.$emit('viewevent','list',1)
        },
    },
    mounted()
    {
        var that = this
        axios.get('/getclassdetail?course='+this.item).then(function(res){
            if(res.data.status==0){
                that.items=res.data.item
                that.title=res.data.title
                that.teacher=res.data.teacher
            }
            if(res.data.status == 1){
                alert(res.data.message)
                this.$emit('viewevent','list',1)
            }
        }).catch(function(err){})
    }
}
</script>
<style scoped>
@import './detail.css'
</style>
