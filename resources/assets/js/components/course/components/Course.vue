<template>
	<div class="edu-flex">
        <div class="edu-sider">
            <div class="edu-teacher">
                <span class="edu-title">教师介绍</span>
                <img src="/images/avatar.jpg"/>
                <span>XXXXX</span>
                <p>XXXXXX XXXXXX lXXXXXXX XXXXXXXXXXXXXXXXXXX</p>
            </div>
            <div class="edu-classes">
                <span class="edu-title">课程目录</span>
                <ul class="edu-class-list">        
                    <li>第一节:课程介绍</li> 
                    <li>第二节:课程介绍</li> 
                    <li>第三节:课课程介绍课程介绍课程介绍课程介绍程介绍</li> 
                    <li>第四节:课程介绍</li> 
                    <li>第五节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                    <li>第一节:课程介绍</li> 
                </ul>
            </div>
        </div>
        <div class="edu-main">
            <div class="edu-main-ind">
                <div class="edu-first-line">
                    <span>课程简介</span>
                    <p>dsgdjgkdjgljgfjgkfjggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggglsdkjglsdkjgksdjgksdgj</p>
                </div>
                <div class="edu-button-group">
                    <button>购买此课程</button>
                    <button>下载作业</button>
                    <button>上传作业</button>
                </div>
            </div>
            <div class="edu-main-video">
                <video controls="controls">
                    <source src="/test.mp4" type="video/mp4"/>
                </video>
            </div>
        </div>
	</div>
</template>
<script>
	export default{
	}
</script>
<style scoped>
    .edu-button-group{
        width:100%;
        margin-bottom:20px;
    }
    .edu-button-group>button{
        float:right;
        float: right;
        margin-right: 20px;
        border: 0;
        height: 40px;
        background-color: #202020;
        color: white;
        cursor: pointer;
    }
    .edu-first-line{
        width: 100%;
        padding-top: 50px;
    }
    .edu-flex{
        width:1280px;
        display:flex;
        flex-direction:row;
        border:1px solid #dbdbdb;
        margin-top:20px;
    }
    .edu-sider{
        width:30%;
        min-height:720px;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
    }
    .edu-main{
        width:70%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
        align-self:start;
    }
    .edu-teacher{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
    }
    .edu-teacher p{
        word-break:break-all;
        width:80%;
    }
    .edu-teacher img{
        width:40%;
        margin-top:80px;
        border-radius:50%;
        margin-bottom:20px;
    }
    .edu-title{
        width:calc(100% - 20px);
        height:50px;
        background-color:#E7E9E7;
        line-height:50px;
        font-size:20px;
        font-weight:800;
        padding-left:20px;
    }
    .edu-classes{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
    }
    .edu-class-list{
        width:calc( 100% - 40px );
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
        overflow:hidden;
        text-overflow:ellipsis;
    }
    .edu-class-list li{
        list-style:none;
        height:40px;
        white-space:nowrap;
        width:100%;
        overflow:hidden;
        text-overflow:ellipsis;
        border-width:0 0 1px 0;
        border-style:solid;
        border-color:gray;
        cursor:pointer;
        line-height:40px;
    }
    .edu-class-list li:hover{
        background-color:#C8C3C3;
    }
    .edu-class-list li:active{
        background-color:#3C3C3C;
        color:white;
    }
    .edu-main-ind{
        width:100%;
        height:300px;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        align-items:flex-start;
    }
    .edu-main-ind span{
        margin:40px 0 0 50px;
        font-size:20px;
        font-weight:600;
    }
    .edu-main-ind p{
        margin-left:50px;
        width:calc( 100% - 50px);
        word-break:break-all;
    }
    .edu-main-video{
        width:100%;

    }
    .edu-main-video video{
        width:100%;
    }
</style>
