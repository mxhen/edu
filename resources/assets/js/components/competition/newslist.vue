<template>
<div class="edu-news">
    <div class="edu-news-item">
        <span class="edu-item-span-1"></span>
        <span class="edu-item-span-2">腾讯招聘Q币充值员，年薪100万</span>
        <span class="edu-item-span-3">2017-01-01</span>
    </div>
    <div class="edu-news-item">
        <span class="edu-item-span-1"></span>
        <span class="edu-item-span-2">腾讯招聘Q币充值员，年薪100万</span>
        <span class="edu-item-span-3">2017-01-01</span>
    </div>
    <div class="edu-news-item">
        <span class="edu-item-span-1"></span>
        <span class="edu-item-span-2">腾讯招聘Q币充值员，年薪100万</span>
        <span class="edu-item-span-3">2017-01-01</span>
    </div>
</div>
</template>
<style scoped>
.edu-news{
    width:70%;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:center;
}
.edu-news-item{
    width: 100%;
    display: flex;
    flex-direction: row;
    height: 50px;
    border-width: 1px;
    border-style: solid;
    border-color: white;
    cursor:pointer;
}
.edu-item-span-1{
    width: 30px;
    background-color:#424242; 
}
.edu-item-span-2{
    width: 89%;
    height: 50px;
    line-height: 50px;
    padding-left: 20px;
    font-size: 20px;
}
.edu-item-span-3{
    height: 50px;
    line-height: 50px;
    font-size: 15px;
    color: gray;
}
</style>
