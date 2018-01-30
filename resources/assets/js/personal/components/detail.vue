<template>
<div class="head">
    <div class="news-detail">
        <div class="news-title">
            <button @click="backtolist">返回</button>
            <span style="font-size:20px;margin-left:60px">{{title}}</span>
        </div>
        <div class="second-title">
            <span>{{teacher}}</span>
        </div>
        <div v-if="item.role == 1" class="operate-btn">
            <button>修改课程名</button>
            <button @click="addclass">添加课时</button>
            <button @click="deletecourse">删除此课程</button>
        </div>
        <div class="classes">
            <span v-for="(item,index) in items" :class="{selected:selected==index}" @click="showclass(item.videourl,item.homework,item.owner,item.id,index)">{{index+1}}</span>
        </div>
        <div v-if="videoflag == 1" class="third-title">
            <video controls="controls" :src="'/videos/'+videourl" autoplay="autoplay">
                <source :src="'/videos/'+videourl" type="video/mp4"/>
            </video>
        </div>
        <div v-if="opflag == 1" class="btn-grp">
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
        <div v-if="opflag == 2" class="btn-grp">
            <label @click="deleteclass">删除此课时</label>
        </div>
        <!--div class="btn-grp">
            <button>下载作业</button>
            <button>上传作业</button>
        </div-->
    </div>
</div>
</template>
<script>
export default{
    props:['item'],
    data(){
        return {
            items:[],
            title:'',
            teacher:'',
            videourl:'',
            videoflag:0,
            opflag:-1,
            selected:-1,
            homework:'',
            submitflag:0,
            course:-1,
            courseid:-1,
            role:-1,
            classid:-1
        }
    },
    methods:{
        deleteclass(){
            var that = this
            if(!window.confirm('你确定要删除吗?')){
                return
            }
            that.reset()
            axios.get('/deleteclass?classid='+this.classid).then(function(res){
                if(res.data.status == 0){
                    alert('删除成功')
                    that.getdata()
                }
                if(res.data.status == 1){
                    alert(res.data.message)
                }
            }).catch(function(err){})
        },
        deletecourse(){
            var that = this
            if(!window.confirm('你确定要删除吗?')){
                return
            }
            axios.get('/deletecourse?courseid='+this.courseid).then(function(res){
                if(res.data.status == 0){
                    alert('删除成功')
                    that.backtolist()
                }
                if(res.data.status == 1){
                    alert(res.data.message)
                }
            }).catch(function(err){})
        },
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
            console.log(params)
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
        showclass(video,homework,course,id,index){
            this.classid=id
            this.course=course
            this.selected=index
            this.videoflag=1
            if(this.role==0)
                this.opflag=1
            else
                this.opflag=2
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
        addclass(){
            this.$emit('viewevent','addclass',this.item.update)
        },
        getdata(){
            var that = this
            axios.get('/classlist?course='+this.item.update).then(function(res){
                if(res.data.status==0){
                    that.items=res.data.item
                    that.title=res.data.title
                    that.teacher=res.data.teacher
                    that.courseid=res.data.course
                    that.role=res.data.role
                }
                if(res.data.status == 1){
                    alert(res.data.message)
                }
            }).catch(function(err){})
        },
        reset(){
            this.videoflag=-1
            this.opflag=-1
        }
    },
    mounted()
    {
        this.getdata()
    }
}
</script>
<style scoped>
@import './detail.css'
</style>
