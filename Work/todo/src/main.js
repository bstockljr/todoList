import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Vue from 'vue';
//---------------------------------------//
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/src/jquery.js';
import 'bootstrap/dist/js/bootstrap.min.js';
//---------------------------------------//
import ElementPlus from "element-plus";
import 'element-plus/dist/index.css'


createApp(App).use(store).use(router).use(ElementPlus).mount('#app');


// import Vue from 'vue';
// import App from './App.vue';
// import router from './router';
// import 'bootstrap';
// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'jquery/src/jquery.js';
// import 'bootstrap/dist/js/bootstrap.min.js';
// import store from './store';
// import ElementUI from 'element-ui';
// import 'element-ui/lib/theme-chalk/index.css';
// Vue.config.productionTip = false
// Vue.use(ElementUI);
// new Vue({
//   router,
//   store,
//   render: h => h(App),
// }).$mount('#app')









