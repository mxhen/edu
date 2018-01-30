<template>
<div class="edu-component">
    <div class="edu-com-item">
        <div class="edu-com-item-img">
            <img src="/timg.jpg" />
            <span>环法自行车大赛</span>
        </div>
        <div class="edu-com-item-int">
            <p>自从1903年开始以来，每年于夏季举行，每次赛期23天，共21个赛段，平均赛程超过3500公里(约2200英里)。完整赛程每年不一，但大都环绕法国一周。近年来，比赛结束前总是会穿越巴黎市中心的香榭丽舍大道，并且经过埃菲尔铁塔。比赛全程分成许多段，从一个城镇到下一个，每一段分别计时排名。所有段成绩累计起来决定每一位赛手的总成绩。冠军为各段时间累计最少者。在每日赛事结束时，领先者将可穿上黄色领骑衫，最佳冲刺者将被赠与一件绿色车衣，山间赛事中最佳骑士将会得到一件波尔卡点运动衣，其有时被称作山颠之王。</p>
            <div class="edu-button">
                <button @click="viewcom('id')">查看详情</button>
            </div>
        </div>
    </div>
    <div class="edu-com-item">
        <div class="edu-com-item-img">
            <img src="/timg2.jpg" />
            <span>地瓜村选美比赛</span>
        </div>
        <div class="edu-com-item-int">
            <p>自从1903年开始以来，每年于夏季举行，每次赛期23天，共21个赛段，平均赛程超过3500公里(约2200英里)。完整赛程每年不一，但大都环绕法国一周。近年来，比赛结束前总是会穿越巴黎市中心的香榭丽舍大道，并且经过埃菲尔铁塔。比赛全程分成许多段，从一个城镇到下一个，每一段分别计时排名。所有段成绩累计起来决定每一位赛手的总成绩。冠军为各段时间累计最少者。在每日赛事结束时，领先者将可穿上黄色领骑衫，最佳冲刺者将被赠与一件绿色车衣，山间赛事中最佳骑士将会得到一件波尔卡点运动衣，其有时被称作山颠之王。</p>
            <div class="edu-button">
                <button>查看详情</button>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default{
    methods:{
        viewcom(id){
            Bus.$emit('changeView','competition')
        }
    }
}
</script>
<style scoped>
.edu-component{
    width:100%;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:center;
}
.edu-com-item{
    width:80%;
    display:flex;
    flex-direction:row;
    border-width: 1px;
    border-style: solid;
    border-color: #90888c;
    margin-bottom:40px;
}
.edu-com-item-img{
    flex:1;
    position:relative;
}
.edu-com-item-img>img{
    width:100%;
}
.edu-com-item-img>span{
    position: absolute;
    left: 0;
    bottom: 0;
    width: calc( 100% - 10px );
    height: 50px;
    background: rgba(0,0,0,0.5);
    color: white;
    padding-left: 10px;
    font-size: 20px;
    line-height: 50px;
}
.edu-com-item-int{
    flex:2;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.edu-com-item-int>p{
    overflow: hidden;
    overflow-x: hidden;
    overflow-y: hidden;
    max-height: 160px;
    margin: 10px 20px 10px 20px;
}
.edu-button>button{
    float: right;
    border: 0;
    background: #202020;
    color: white;
    height: 30px;
    font-size: 18px;
    margin-right: 20px;
    margin-bottom: 10px;
    line-height: 30px;
    cursor: pointer;
}
.edu-button>button:active{
    background-color:#1d1653;
}
</style>
