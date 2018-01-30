//const greeter = require('./Greeter.js');
//console.log(greeter)
//document.querySelector('#app').appendChild(greeter());
import Vue from 'vue';
import eduHeader from './components/Header.vue';
import eduFooter from './components/Footer.vue';
import eduMain from './components/Main.vue'

window.hello=new Vue({
	el:"#app",
	components:{eduHeader,eduFooter,eduMain},
	methods:{
		test1:function(){
			alert("dd")
		}
	}
});
