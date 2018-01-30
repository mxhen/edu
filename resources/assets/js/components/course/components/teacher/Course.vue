<template>
<div class="edu-teacher">
    <div class="edu-teacher-all">
        <span>课程详情</span>
        <div class="edu-teacher-course-int">
            <img src="/images/type.jpg"/>
            <p title="双击修改">这是一个测试哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈这这这是一个测试哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈
是一个测试哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈
是一个测试哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈
            </p>
        </div>
        <div class="edu-class-add-btn">
            <button>增加</button>
            <button>学生考核</button>
        </div>
        <div class="edu-class-singal">
            <div>
                <span>第一节 行为的艺术</span>
                <div>
                    <button>上传作业</button>
                    <button>查看作业</button>
                    <button>编辑</button>
                    <button>删除</button>
                </div>
            </div>
            <div>
                <span>第二节 伟大的思想家</span>
                <div>
                    <button>上传作业</button>
                    <button>查看作业</button>
                    <button>编辑</button>
                    <button>删除</button>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</div>
</template>
<style scoped>
.edu-teacher{
}
.edu-teacher-all{
    width:100%;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:flex-start;
}
.edu-teacher-all>span{
    margin:40px 0 0 50px;
    font-size:20px;
    font-weight:600;
}
.edu-teacher-all>div{
    width:calc( 100% - 100px );
    margin:20px 50px 0 50px;
}
.edu-teacher-course-int{
    display:flex;
    flex-direction:row;
    justify-content:flex-start;
    align-items:flex-start;
    border-width: 0 0 1px 0;
    border-color: gray;
    padding-bottom: 30px;
}
.edu-teacher-course-int>img{
    width:260px;
    margin:0 20px 0 20px;
}
.edu-teacher-course-int>p{
    margin:0;
    cursor:pointer;
}
.edu-class-singal{
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:flex-start;
    height:200px;
    overflow:auto;
}
.edu-class-add-btn{
    width:100%;
    display:flex;
    justify-content:flex-end;
    align-items:center;
    border-width: 0 0 1px 0;
    border-color: gray;
    border-style: solid;
    padding-bottom: 10px;
}
.edu-class-singal>div{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    align-items:center;
    width:100%;
    margin-bottom:10px;
}

</style>
