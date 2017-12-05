
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

import Vue from 'vue'
import example from './views/Example.vue'
import router from './routes/routes.js'
import store from './store/main.js'
import vueInfiniteScroll from 'vue-infinite-scroll'
Vue.use(vueInfiniteScroll)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var VueObj = Vue.extend(example);
const app = new VueObj({
    el: '#app',
    store,
    router
});
