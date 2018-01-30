<template>
<div class="edu-flex">
	<div class="edu-content">
        <div class="edu-news-sider">
            <div class="edu-news-list">
                <span class="news-center-1">个人中心</span>
                <span class="news-2" @click="sectionswitch(0)" :class="{'news-select':select==0}" >个人信息</span>
                <span class="news-2" v-if="role==1" @click="sectionswitch(1)" :class="{'news-select':select==1}" >课程管理</span>
                <span class="news-2" v-if="role==0" @click="sectionswitch(2)" :class="{'news-select':select==1}" >我的课程</span>
            </div>
        </div>
        <div class="edu-news-component">
            <div class="edu-news-head">
                <span>详细信息</span>
                <div>
                </div>
            </div>
            <keep-alive include="list">
                <component :is="currentView" :item="type" @viewevent="switchview">
                </component>
            </keep-alive>
        </div>
	</div>
</div>
</template>
<script>
    import personinfo from './components/personinfo.vue'
    import list from './components/list.vue'
    import addcourse from './components/addcourse.vue'
    import detail from './components/detail.vue'
    import addclass from './components/addclass.vue'
	export default {
		data(){
            return {
                currentView:'personinfo',
                role:-1, //角色，0表示学生，1表示老师
                select:0,
                type:{
                    role:-1
                }
            }
		},
        components:{personinfo,list,addcourse,detail,addclass},
		methods:{
            sectionswitch(val){
                switch(val){
                    case 0:this.currentView='personinfo';this.select=val;break
                    case 1:this.getcourse(1,0);break;
                    case 2:this.getcourse(0,0);break;
                }
            },
            switchview(val,fresh){
                if(val == 'detail'){
                    this.type = {
                            role:this.type.role,
                            item:this.type.item,
                            update:fresh
                    }
                    this.currentView=val
                    return
                }
                if(val == 'addclass'){
                    this.type = {
                            role:this.type.role,
                            item:this.type.item,
                            update:fresh
                    }
                    this.currentView=val
                    return
                }
                if(fresh == 1){
                    //alert(this.type.role)
                    this.getcourse(this.type.role,1)
                }
                //tolist 不刷新
                if(fresh == 0){
                    this.currentView = val
                }
            },
            getcourse(val,fresh){
                var that = this
                axios.get('teachercourselist').then(function(res){
                    if(res.data.status == 0){
                        that.type={
                            role:val,
                            item:res.data.item,
                            update:fresh
                        }
                        that.currentView = 'list'
                        that.select = 1
                    }
                }).catch(function(err){})
            }
		},
		created(){
		},
		mounted(){
            var that=this
            axios.get('/getuserrole').then(function(res){
                if(res.data.status == 0){
                    that.role = res.data.role
                }
                if(res.data.status == 1){
                    alert('服务器错误')
                }
            }).catch(function(err){})
		},
		watch:{
        }
	}
</script>
<style scoped>
@import './main.css'
</style>
