<template>
<div class="edu-flex">
	<div class="edu-banner">
        <img :src="banner"/>
	</div>
	<div class="edu-content">
		<div class="edu-content-flex title">
			<div class="edu-content-news">
				<div class="edu-flex-grow-1 edu-left edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">科技创新</span>
                        <span class="edu-news-more" @click="showlist(0)">more</span>
                    </div>
                    <p v-for="item in news0" @click="showdetail(item.id)">{{item.time}} {{item.title}}</p>
				</div>
				<!--div class="edu-flex-grow-2">
					d
				</div-->
				<div class="edu-flex-grow-1 edu-right edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">前沿技术</span>
                        <span class="edu-news-more" @click="showlist(1)">more</span>
                    </div>
                    <p v-for="item in news1" @click="showdetail(item.id)">{{item.time}} {{item.title}}</p>
				</div>
			</div>
		</div>
		<div class="edu-content-flex title">
			<!--span>产业模块 Industry module</span-->
            <div class="edu-content-news">
				<div class="edu-flex-grow-1 edu-left edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">竞赛培训</span>
                        <span class="edu-news-more" @click="showlist(2)">more</span>
                    </div>
                    <p v-for="item in news2" @click="showdetail(item.id)">{{item.time}} {{item.title}}</p>
				</div>
				</div-->
				<div class="edu-flex-grow-1 edu-right edu-news-until">
                    <div class="edu-main-news-title">
                        <span class="edu-news-title">成果转化</span>
                        <span class="edu-news-more" @click="showlist(3)">more</span>
                    </div>
                    <p v-for="item in news3" @click="showdetail(item.id)">{{item.time}} {{item.title}}</p>
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
                return{
                    banner:'/images/banner1.jpg',
                    order2:false,
                    news0:[],
                    news1:[],
                    news2:[],
                    news3:[]
                }
		},
		methods:{
            showlist(val){
                window.location.href='/news?type='+val
            },
            showdetail(val){
                window.location.href='/news?page='+val
            },
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
            axios.get('/newsgroup').then(function(res){
                if(res.data.status == 0){
                    that.news0 = res.data.news0
                    that.news1 = res.data.news1
                    that.news2 = res.data.news2
                    that.news3 = res.data.news3
                }
            }).catch(function(err){})
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
<style scoped lang="less">
@import './main.less';
</style>
