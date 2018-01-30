require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import eduHeader from './components/student/Header.vue';
import eduFooter from './components/student/Footer.vue';
import eduMain from './components/student/Main.vue'


const app = new Vue({
    el: '#app',
	components:{eduHeader,eduFooter,eduMain},
});
