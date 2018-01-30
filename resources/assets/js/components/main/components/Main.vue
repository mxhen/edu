<template>
<div class="edu-flex">
	<div class="edu-banner">
		<transition-group tag='ul' class="edu-list" name="image">
		<li v-for='(image,index) in img' :key='index' :class="{ 'edu-order-2':(index == mark) && order2 }" v-show="index == mark">
				<a><img :src="'/images/'+image"></a>
			</li>
		</transition-group>
		<div class="bullet">
			<span v-for='(item,index) in img.length' :class="{ 'span-active':index==mark}" @click="change(index)" :key="index"></span>
		</div>
	</div>
	<div class="edu-content">
		<div class="edu-content-flex title">
			<span>新闻资讯 News</span>
			<div class="edu-content-news">
				<div class="edu-flex-grow-1 edu-left edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">科技创新</span>
                        <span class="edu-news-more">more</span>
                    </div>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
				</div>
				<!--div class="edu-flex-grow-2">
					d
				</div-->
				<div class="edu-flex-grow-1 edu-right edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">前沿技术</span>
                        <span class="edu-news-more">more</span>
                    </div>

                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>

                    <p>2017-12-05 胡钢董事长当选为中华全国工商联第十二届执行委员会常务委员</p>
				</div>
			</div>
		</div>
		<div class="edu-content-flex title">
			<!--span>产业模块 Industry module</span-->
            <div class="edu-content-news">
				<div class="edu-flex-grow-1 edu-left edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">竞赛培训</span>
                        <span class="edu-news-more">more</span>
                    </div>
				</div>
				<!--div class="edu-flex-grow-2">
					d
				</div-->
				<div class="edu-flex-grow-1 edu-right edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">成果转化</span>
                        <span class="edu-news-more">more</span>
                    </div>
				</div>
			</div>
			<!--div class="edu-content-news">
				<img class="edu-ind-img" src="/images/cy.jpg" usemap="#edumap"/>
				<map name="edumap" id="edumap">
					<area v-for="(item, index) in coords" shape="circle" :coords="item.x+','+item.y+','+coord" :href="'page'+index" :alt="index"/>
				</map>
			</div-->
		</div>
	</div>
</div>
</template>
<script>
	module.exports= {
		data:function(){
			var screenWidth = document.body.clientWidth
			if(screenWidth>=1280)
				screenWidth = screenWidth*0.64
			else
				screenWidth = 1280*0.64
			var coords=[
					{x:90,y:166},
					{x:220,y:346},
					{x:390,y:93},
					{x:470,y:300},
					{x:690,y:136},
					{x:720,y:370},
					{x:930,y:330},
					{x:970,y:90},
					{x:1250,y:270},
					{x:1350,y:110}
				]
			var newcoods=[]
			for(var i=0;i<10;i++){
				var temp={}
				temp.x=coords[i].x*screenWidth/1463
				temp.y=coords[i].y*screenWidth/1463
				newcoods.push(temp)
			}
			return {
				screenWidth:screenWidth,
				coords:newcoods,
				coord:90*screenWidth/1463,
				//coord:100,
				lastWidth:screenWidth,
				mark:0,
				img:[
				'banner1.jpg',
				'banner2.jpg',
				'banner3.jpg',
				'banner4.jpg'
				],
				order2:false
			}
		},
		methods:{
			change:function(index){
				if(this.mark > index)
					this.order2 = true
				else
					this.order2 = false
				this.mark = index
			},
			test1(){
				this.coord+=1
			},
			autoPlay(){
				this.mark++
				this.order2 = false
				if(this.mark === 4){
					this.order2 = true
					this.mark = 0
					return
				}
			},
			play(){
				setInterval(this.autoPlay,5000)
			}
		},
		created(){
			this.play()
		},
		mounted:function(){
			var that = this
			if(document.body.clientWidth >=1280)
				that.screenWidth = document.body.clientWidth*0.64;
			else
				that.screenWidth = 1280*0.64
			window.onresize = function(){
				window.screenWidth = document.body.clientWidth;
				that.screenWidth = window.screenWidth;
				if(that.screenWidth>=1280)
					that.screenWidth = that.screenWidth*0.64
				else
					that.screenWidth = 1280*0.64
				console.log("on",that.screenWidth)
			}
		},
		watch:{
			screenWidth:function(val){
				var newcoords = []
				for(var i =0;i<10;i++){
					var temp={}
					//this.$set(this.coords[i],'x',this.coords[i].x*val/this.lastWidth)
					//this.$set(this.coords[i],'y',this.coords[i].y*val/this.lastWidth)

					temp.x=this.coords[i].x*val/this.lastWidth
					temp.y=this.coords[i].y*val/this.lastWidth
					newcoords.push(temp)
				}
				this.coords = newcoords	
				this.coord = this.coord*val/this.lastWidth
				this.$set(this,'coord',this.coord)
				this.lastWidth = val
			}
		}
	}
</script>
<style scoped>
@import './main.css'
</style>
