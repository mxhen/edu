<template>
<div class="int-root">
    <div class="int-title">
        <span>{{intitem.name}}</span>
        <button>购买课程</button>
    </div>
    <div class="int-content-1">
        <div>
            <img class="int-img" :src="intitem.url"/>
        </div>
        <div>
            <div>
                <span class="int-span-1">入学条件:</span>
                <span class="int-span-2">{{intitem.request}} </span>
            </div>
            <div>
                <span class="int-span-1">职位胜任:</span>
                <span class="int-span-2">{{intitem.position}}</span>
            </div>
            <div>
                <span class="int-span-1">课程简介:</span>
                <span class="int-span-2">{{intitem.abstract}}</span>
            </div>
            <div>
                <span class="int-span-1">所获证书:</span>
                <span class="int-span-2">{{intitem.cert}}</span>
            </div>
        </div>
    </div>
    <div class="int-detail">
        <ul>
            <li class="int-int">详细介绍</li>
            <li :class="{'int-selected':tabswitch==0}" @click="switchtab(0)">教学模式</li>
            <li :class="{'int-selected':tabswitch==1}" @click="switchtab(1)">课程特色</li>
            <li :class="{'int-selected':tabswitch==2}" @click="switchtab(2)">课程设置</li>
        </ul>
        <div class="int-main" ref="intdetail">
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['intitem'],
    data(){
        return{
            tabswitch:0,
            intitem0:{
                model1:'0计算机和互联网络的出现使人类文明达到一种全新的高度，在这个高度信息化的IT时代里，网络设备、操作系统、应用服务成为叱咤风云的三剑客，通信、金融、国防、教育、医疗……几乎所有的行业都离不开它们。本课程将带领大家进入神秘的计算机网络和信息安全世界。BENET4.0产品的课程结构划为三个学习阶段，涵盖网络、Windows、Linux三大主要技能，其中第三个阶段又分为两个方向，定向打造更专业的信息安全人才。',
                special1:'1计算机和互联网络的出现使人类文明达到一种全新的高度，在这个高度信息化的IT时代里，网络设备、操作系统、应用服务成为叱咤风云的三剑客，通信、金融、国防、教育、医疗……几乎所有的行业都离不开它们。本课程将带领大家进入神秘的计算机网络和信息安全世界。BENET4.0产品的课程结构划为三个学习阶段，涵盖网络、Windows、Linux三大主要技能，其中第三个阶段又分为两个方向，定向打造更专业的信息安全人才。',
                plan1:'2计算机和互联网络的出现使人类文明达到一种全新的高度，在这个高度信息化的IT时代里，网络设备、操作系统、应用服务成为叱咤风云的三剑客，通信、金融、国防、教育、医疗……几乎所有的行业都离不开它们。本课程将带领大家进入神秘的计算机网络和信息安全世界。BENET4.0产品的课程结构划为三个学习阶段，涵盖网络、Windows、Linux三大主要技能，其中第三个阶段又分为两个方向，定向打造更专业的信息安全人才。',
                model:this.intitem.way,
                special:this.intitem.special,
                plan:this.intitem.plan
            }
            
        }
    },
    methods:{
        switchtab(val){
            if(val == this.tabswitch)
                return
            this.tabswitch = val
            switch(val){
                case 0:this.$refs.intdetail.innerHTML=this.intitem.way;break;
                case 1:this.$refs.intdetail.innerHTML=this.intitem.special;break;
                case 2:this.$refs.intdetail.innerHTML=this.intitem.plan;break;
            }
        }
    },
    mounted(){
        var that = this
        this.$refs.intdetail.innerHTML=this.intitem.model
        this.$watch('intitem.abstract',function(val){
            that.tabswitch = 1
            that.switchtab(0)
            that.tabswitch = 0
        })
    },
    watch:{
    }
}
</script>
<style scoped lang="less">
@import './introduce.less';
</style>
