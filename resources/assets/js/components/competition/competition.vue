<template>
<div class="edu-com-main">
    <div class="edu-banner">
        <img src="/banner.jpg" />
    </div>
    <div class="edu-com-tab">
        <span>首页</span>
        <span>大赛简介</span>
        <span>大赛规则</span>
        <span>获奖名单</span>
        <span>大赛评委</span>
        <span class="edu-com-order">大赛报名</span>
    </div>
    <div>
    </div>
</div>
</template>
<style scoped>
.edu-com-main{
    width:100%;
}
.edu-banner{
    width:100%;
}
.edu-banner>img{
    width:100%;
}
.edu-com-tab{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    background-color: #00b399;
    height: 40px;
}
.edu-com-tab>span{
    color: white;
    height: 40px;
    line-height: 40px;
    font-size: 20px;
    cursor: pointer;
    padding: 0 5px 0 5px;
}
.edu-com-tab>span:hover{
    background-color:#0d5265;
}
.edu-com-order{
    background-color:red;
}
</style>
