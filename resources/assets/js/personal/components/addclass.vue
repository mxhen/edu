<template>
<div class="addclass-head">
    <div class="addclass-news-detail">
        <div class="addclass-news-title">
            <button @click="backtodetail">返回</button>
        </div>
        <form method="post" action="" style="width:95%">

            <div class="form-group " id="aetherupload-wrapper" ><!--组件最外部需要有一个名为aetherupload-wrapper的id，用以包装组件-->
                <label>上传课程视频(100M以内mp4格式)</label>
                <div class="controls" >
                    <input type="file" name="input1" id="file"  onchange="aetherupload(this,'file').success(function(){
                       // $('#videobridge').attr('value','/videos/'+$('#savedpath').val()).change()
                    }).upload()" accept="video/mp4"/><!--需要有一个名为file的id，用以标识上传的文件，aetherupload(file,group)中第二个参数为分组名，success方法可用于声名上传成功后的回调方法名-->
                    <div class="progress " style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
                        <div id="progressbar" style="background:blue;height:6px;width:0;"></div><!--需要有一个名为progressbar的id，用以标识进度条-->
                    </div>
                    <span style="font-size:12px;color:#aaa;" id="output"></span><!--需要有一个名为output的id，用以标识提示信息-->
                    <input type="hidden" name="file1" id="savedpath" ><!--需要有一个名为savedpath的id，用以标识文件保存路径的表单字段，还需要一个任意名称的name-->
                </div>
            </div>
            <div class="form-group " id="aetherupload-wrapper">
                <label>上传作业(压缩包格式)</label>
                <div class="controls" >
                    <input type="file" id="file" name="input2" onchange="aetherupload(this,'file').upload()"/>
                    <div class="progress " style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
                        <div id="progressbar" style="background:blue;height:6px;width:0;"></div>
                    </div>
                    <span style="font-size:12px;color:#aaa;" id="output"></span>
                    <input type="hidden" name="file2" id="savedpath" >
                </div>
            </div>

            <!--button type="submit" class="btn btn-primary">点击提交</button-->
        </form>

        <hr/>

        <div id="result"></div>

    </div>

        <div class="addclass-second-title">
        </div>
        <div class="addclass-third-title">
            <!--button @click="test">test</button-->
            <button @click="reset()">重置</button>
            <button @click="submit">发布</button>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['item'],
    data(){
        return{
            coursetitle:'',
            courseabstrate:'',
            picwords:'',
            videourl:null,
            fileurl:null
        }
    },
    methods:{
        reset(){
            $("input[name='file1']").val('')
            $("input[name='input1']").removeAttr('disabled')
            $("input[name='input2']").removeAttr('disabled')
            $("input[name='file2']").val('')
            $("input[name='input1']").val('')
            $("input[name='input2']").val('')
        },
        videochange(){
            console.log('change')
                console.log(event.target.value)
        },
        test(){
            alert('dd')
            console.log('video',this.videourl)
            console.log('video',this.fileurl)
        },
        backtodetail(){
            this.$emit('viewevent','detail',this.item.update)
        },
        submit(){
            var video =$("input[name='file1']").val()  
            if(video==""){
                alert('请上传视频')
                return
            }
            var homework = $("input[name='file2']").val()
            var params={
                id:this.item.update,
                video:video,
                homework:homework
            }
            console.log(params)
            var that = this
            axios.post('/addclass',params).then(function(res){
                if(res.data.status == 0){
                    alert('发布成功')
                    that.backtodetail()
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
    },
    mounted(){
        //alert(this.item)
    }
}
</script>
<style scoped>
@import './addclass.css'
</style>

