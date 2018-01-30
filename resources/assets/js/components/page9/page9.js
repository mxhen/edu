import Vue from 'vue'
import eduHeader from './components/Header.vue';
import eduFooter from '../main/components/Footer.vue';
import eduMain from './components/Main.vue';

new Vue({
	el:"#app",
	components:{eduHeader,eduFooter,eduMain},
	methods:{
		test(){
			alert("dd")
		}
	}
})
