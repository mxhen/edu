require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import eduMain from './login/Main.vue'
import eduHead from './common/head.vue'
import eduFooter from './common/Footer.vue'

const app = new Vue({
    el: '#app',
	components:{eduHead,eduMain,eduFooter},
});
