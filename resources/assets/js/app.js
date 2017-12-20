/*import Vue from 'vue';


// import VueRouter from 'vue-router';
// Vue.use(VueRouter);

// import VueAxios from 'vue-axios';
// import axios from 'axios';
// Vue.use(VueAxios, axios);

// import App from './App.vue';
import Example from './components/Example.vue';
// import Slider from './components/Slider.vue';
// import Home from './components/Home.vue';
// import Navbar from './components/Navbar.vue';
// import Footer from './components/Footer.vue';

// new Vue(Vue.util.extend({ router }, Slider)).$mount('#slider');

const routes = [
    {
        name: 'Example',
        path: '/',
        component: Example
    }
];

const app = new Vue({
    el: '#example'
});

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, Example)).$mount('#example');
Vue.component('example', require('./components/Example.vue'));
// new Vue(Vue.util.extend({ router }, Slider)).$mount('#slider');
// new Vue(Vue.util.extend({ router }, Home)).$mount('#home');
// new Vue(Vue.util.extend({ router }, Footer)).$mount('#footer');
// new Vue(Vue.util.extend({ router }, Navbar)).$mount('#navbar');
// Vue.component('post', require('./components/Post.vue'));

*/
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue'));
Vue.component('posts', require('./components/Posts.vue'));
Vue.component('post', require('./components/Post.vue'));
Vue.component('comment', require('./components/Comment.vue'));

const app = new Vue({
    el: '#app'
});
