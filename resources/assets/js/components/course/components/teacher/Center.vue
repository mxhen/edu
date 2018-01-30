<template>
<div class="edu-teacher">
    <div class="edu-teacher-all">
        <span>我的课程</span>
        <div class="edu-class-add-btn">
            <button>增加</button>
        </div>
        <div class="edu-teacher-class">
            <div @click="entercourse(1)">
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
</div>
</template>
<script>
export default {
methods:{
            entercourse(val){
                this.$emit("courseturn",val)
            }
        }
}
</script>
<style scoped>
.edu-teacher{
}
.edu-teacher-all{
        width:100%;
        height:300px;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:flex-start;
}
.edu-teacher-all span{
    margin:40px 0 0 50px;
    font-size:20px;
    font-weight:600;
}
.edu-teacher-class{
    width:calc( 100% - 100px );
    display:flex;
    flex-direction:row;
    justify-content:flex-start;
    align-items:center;
    flex-wrap:wrap;
    margin:0 50px 0 50px;
}
.edu-teacher-class>div{
    width:24%;
    margin:10px 0 10px 5px;
    cursor:pointer;
}
.edu-teacher-class>div>img{
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
