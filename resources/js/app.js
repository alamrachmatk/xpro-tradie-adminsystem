require('./bootstrap');

// bootstrap-vue css
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

window.Vue = require('vue');

import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';

// install rules
Object.keys(rules).forEach(rule => {
  extend(rule, rules[rule]);
});

  // Install components globally
Vue.use(BootstrapVue);
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
Vue.use(BootstrapVue)


import CustomerComponent from './components/customers/Index.vue';
import NewOrderComponent from "./components/neworders/Index.vue"
import WorkOrderComponent from "./components/workorders/Index.vue"

const routes = [
    {
        name: 'customers',
        path: '/customers2',
        component: CustomerComponent
    },
    {
      name: 'neworders',
      path: '/neworders',
      component: NewOrderComponent
    },
    {
      name: 'workorders',
      path: '/workorders',
      component: WorkOrderComponent
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');