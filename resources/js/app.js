/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import App from './App.vue';
import {routes} from './routes';
window.Vue.use(VueRouter);

import Select2 from 'v-select2-component';
import '@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css';
Vue.component('Select2', Select2);

import CKEditor from '@ckeditor/ckeditor5-vue';
window.Vue.use( CKEditor );

const router = new VueRouter({routes});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('pagination', require('laravel-vue-pagination'));
// Vue.component('image-input', require('./components/image-input.vue').default);
// $(document).ready(function () {
//     $('select').select2({
//         theme: 'bootstrap4',
//     });
// });
// $(document).ready(function(){
//     var editor = CKEDITOR.replaceAll();
//     CKFinder.setupCKEditor( editor );
// });
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
