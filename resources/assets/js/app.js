
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    {path: '/sales_mgt', component:  require('./manager/Sales.vue') },
    {path: '/stocks_mgt', component:  require('./manager/Stocks.vue') },
    {path: '/customers_mgt', component:  require('./manager/Customers.vue') },
    {path: '/users_mgt', component:  require('./manager/Users.vue') }
]

const router = new VueRouter({
    mode: 'history',
    routes
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
