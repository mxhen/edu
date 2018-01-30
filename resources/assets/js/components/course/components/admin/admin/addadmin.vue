<template>
<div>
    <div class="edu-admin-item">
        <span>新增管理员</span>
        <div class="edu-class-add-btn">
        </div>
        <div class="edu-item-unitl">
            <div class="edu-singal-teacher">
                <div class="item-detail">
                    <span>登录邮箱</span>
                </div>
                <div class="item-detail-2">
                    <input />
                </div>

            </div>
            <div class="edu-singal-teacher">
                <div class="item-detail">
                    <span>密码</span>
                </div>
                <div class="item-detail-2">
                    <input />
                </div>
            </div>
            <div class="edu-singal-teacher">
                <div class="item-detail">
                    <span>确认密码</span>
                </div>
                <div class="item-detail-2">
                    <input />
                </div>
            </div>
            <div class="edu-singal-teacher">
                <div class="item-detail">
                    <button>增加</button>
                </div>
            </div>
        </div>
    </div>
</div>

</template>
<script>
export default{
    methods:{
        admin(val){
            this.$emit('adminemit',val)
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

.edu-singal-teacher{
    width:100%;
    margin:10px 0 10px 5px;
    display:flex;
}
.item-detail{
    flex:2;
}
.item-detail>span{
    cursor:pointer;
}
.item-detail-2{
    flex:1;
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
