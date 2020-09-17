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
import NewOrderDetailComponent from "./components/neworders/Indexdetail.vue"
import WorkOrderComponent from "./components/workorders/Index.vue"
import BiddingComponent from "./components/biddings/Index.vue"
import BiddingDetailComponent from "./components/biddings/Indexdetail.vue"

const routes = [
    {
      name: 'customers',
      path: '/cust',
      component: CustomerComponent
    },
    {
      name: 'neworders',
      path: '/neworders',
      component: NewOrderComponent
    },
    {
      name: 'neworderdetails',
      path: '/neworderdetails/:id(.*)',
      component: NewOrderDetailComponent,
      props: true,
    },
    {
      name: 'workorders',
      path: '/workorders',
      component: WorkOrderComponent
    },
    {
      name: 'biddings',
      path: '/biddings',
      component: BiddingComponent
    },
    {
      name: 'biddingdetails',
      path: '/biddingdetails/:id(.*)',
      component: BiddingDetailComponent,
      props: true,
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');