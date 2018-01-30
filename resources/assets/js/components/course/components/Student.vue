<template>
	<div class="edu-flex-student">
        <div class="edu-sider">
            <div class="edu-student">
                <span class="edu-title">我的名片</span>
                <button>修改信息</button>
                <img src="/images/avatar.jpg"/>
                <span>XXXXX</span>
                <p>XXXXXX XXXXXX lXXXXXXX XXXXXXXXXXXXXXXXXXX</p>
            </div>
            <div class="edu-infos">
                <div>
                    <span>学校:</span>
                    <span>XXXXX大学</span>
                </div>
                <div>
                    <span>QQ:</span>
                    <span>1111111111</span>
                </div>
                <div>
                    <span>邮箱:</span>
                    <span>xxxxxxxx@163.com</span>
                </div>
            </div>
        </div>
        <div class="edu-main">
            <div class="edu-main-ind">
                <span>我已订购课程</span>
                <div class="edu-stu-class">
                    <div>
                        <img src="/images/type.jpg"/>
                    </div>
                    <div>
                        <img src="/images/type.jpg"/>
                    </div>
                    <div>
                        <img src="/images/type.jpg"/>
                    </div>
                    <div>
                        <img src="/images/type.jpg"/>
                    </div>
                    <div>
                        <img src="/images/type.jpg"/>
                    </div>
                    <div>
                        <img src="/images/type.jpg"/>
                    </div>
                </div>
            </div>
            <div class="edu-main-order">
                <span>我的订单</span>
                <div>
                    <span>2017-09-23</span>
                    <span>创新创业课</span>
                </div>
                <div>
                    <span>2017-09-29</span>
                    <span>中国近现代史</span>
                </div>
            </div>
            <!--div class="edu-main-video">
                <span>我的购买历史</span>
            </div-->
        </div>
	</div>
</template>
<script>
	export default{
	}
</script>
<style scoped>
    .edu-flex-student{
        width:1280px;
        display:flex;
        flex-direction:row;
        border:1px solid gray;
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
    .edu-student{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
    }
    .edu-student p{
        word-break:break-all;
        width:80%;
    }
    .edu-student img{
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
    .edu-infos{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
        border-width:1px 0 0 0;
        border-style:solid;
        border-color:gray;
    }
    .edu-infos>div{
        margin:20px 0 0 40px;
    }
    .edu-main-ind{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
    }
    .edu-main-ind span{
        margin:40px 0 0 50px;
        font-size:20px;
        font-weight:600;
    }
    .edu-stu-class{
        width:cal( 100% - 100px );
        display:flex;
        flex-direction:row;
        justify-content:flex-start;
        align-items:center;
        flex-wrap:wrap;
        margin:0 50px 0 50px;
    }
    .edu-stu-class>div{
        width:24%;
        margin:10px 0 10px 5px;
        cursor:pointer;
    }
    .edu-stu-class>div>img{
        width:100%;
    }
    .edu-main-order{
        width:100%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
    }
    .edu-main-order>span{
        margin:40px 0 0 50px;
        font-size:20px;
        font-weight:600;
    }
    .edu-main-order>div{
         width:cal( 100% - 100px );
        display:flex;
        flex-direction:row;
        justify-content:flex-start;
        align-items:center;
        flex-wrap:wrap;
        margin:0 50px 0 50px;
    }
</style>
