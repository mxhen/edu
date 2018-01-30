<template>
<div class="edu-flex">
    <div class="edu-student">
        <div class="edu-information">
            <div>
            </div>
            <div>
            </div>
        </div>
        <div class="edu-goods">
        </div>
    </div>
</div>
</template>
<script>
	module.exports= {
		data:function(){
			
		},
		methods:{
		}
    }
</script>
<style scoped>
	.edu-flex{
		display:flex;
		flex:1 0 auto;
		flex-direction:column;
		justify-content:flex-start;
		align-items:center;
	}
    .edu-student{
        width:1280px;
        display:flex;
        flex-direction:row;
        justify-content:flex-start;
        align-items:flex-start;
    }
    .edu-information{
        width:30%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
    }
    .edu-goods{
        width:70%;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;

    }
</style>
