require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Bus = new Vue();
import eduHeader from './competition/Header.vue';
import eduFooter from './competition/Footer.vue';
import eduMain from './competition/main.vue'


const app = new Vue({
    el: '#app',
	components:{eduHeader,eduFooter,eduMain},
});
