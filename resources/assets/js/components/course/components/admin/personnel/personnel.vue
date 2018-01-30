<template>
<div>
    <div class="edu-admin-item">
        <span>任达华</span>
        <div class="edu-class-add-btn">
            <button></button>
        </div>
        <div class="edu-item-unitl">
            <div class="edu-singal-student">
                <div class="item-detail">
                    <span>学校</span>
                </div>
                <div class="item-detail-2">
                    <span>XXXXX大学</span>
                </div>
            </div>
            <div class="edu-singal-student">
                <div class="item-detail">
                    <span>QQ</span>
                </div>
                <div class="item-detail-2">
                    <span>9494949449</span>
                </div>
            </div>
            <div class="edu-singal-student">
                <div class="item-detail">
                    <span>地址</span>
                </div>
                <div class="item-detail-2">
                    <span>XXXXX大学</span>
                </div>
            </div>
         </div>
    </div>
    <div class="edu-admin-item">
        <span>成绩评定</span>
        <div class="edu-class-add-btn">
        </div>
        <div class="edu-item-unitl">
            <div class="edu-singal-student">
                <div class="item-detail">
                    <span>XXXX比赛</span>
                </div>
                <div class="item-detail-2">
                    <span>XXXXXX地区二等奖</span>
                </div>
            </div>
            <div class="edu-singal-student">
                <div class="item-detail">
                    <span>ZZZZ比赛</span>
                </div>
                <div class="item-detail-2">
                    <span>9494949449</span>
                </div>
            </div>
            <div class="edu-singal-student">
                <div class="item-detail">
                    <span>QQQ比赛</span>
                </div>
                <div class="item-detail-2">
                    <span>XXXXX大学</span>
                </div>
            </div>
         </div>
    </div>

</div>

</template>
<script>
export default{
    methods:{
        student(val){
            this.$emit('studentemit',val)
        }
    }
}
</script>
<style scoped>
.edu-teacher{
}
.edu-admin-item{
    width:100%;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:flex-start;
    min-height:250px;
    height:45%;
}
.edu-admin-item>span{
    margin:40px 0 0 50px;
    font-size:20px;
    font-weight:600;
}
.edu-item-unitl{
    width:calc( 100% - 100px );
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:flex-start;
    margin:0 50px 0 50px;
}

.edu-singal-student{
    width:100%;
    margin:10px 0 10px 5px;
    display:flex;
}
.item-detail{
    flex:1;
}
.item-detail>span{
}
.item-detail-2{
    flex:9;
}
.edu-item-unitl>div>img{
    width:100%;
}
.edu-class-add-btn{
    width:calc( 100% - 100px );
    display:flex;
    justify-content:flex-end;
    align-items:center;
    border-width: 0 0 1px 0;
    border-color: gray;
    border-style: solid;
    padding-bottom: 10px;
    margin:0 50px 0 50px;
}


</style>
