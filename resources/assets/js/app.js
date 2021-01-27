
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');





//--- Vue Imports -------------------------------------------------------------->
    window.Vue = require('vue');
    import moment from 'moment';
    import { Form, HasError, AlertError } from 'vform';

    window.Form = Form;
    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)

    import VueProgressBar from 'vue-progressbar';
    
    import swal from 'sweetalert2';
    window.swal = swal;
    
    const Toast = swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 8000,
      timerProgressBar: true,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', swal.stopTimer)
        toast.addEventListener('mouseleave', swal.resumeTimer)
      }
    });
    window.Toast = Toast;
//--- Vue Imports -------------------------------------------------------------->





//---  Vue Routes -------------------------------------------------------------->
    import VueRouter from 'vue-router';
    Vue.use(VueRouter)
    let routes = [
        {path: '/manager_panel', component:  require('./manager/Sales.vue') },
        {path: '/stocks_mgt', component:  require('./manager/Stocks.vue') },
        {path: '/customers_mgt', component:  require('./manager/Customers.vue') },
        {path: '/users_mgt', component:  require('./manager/Users.vue') }
    ]
    const router = new VueRouter({
        mode: 'history',
        routes
    })
//---  Vue Routes -------------------------------------------------------------->





//---  Vue Components ---------------------------------------------------------->
Vue.component(
    'store-keepers',
    require('./manager/subComponents/storeKeepers.vue')
);

Vue.component(
    'cashiers',
    require('./manager/subComponents/cashiers.vue')
);

Vue.component(
    'managers',
    require('./manager/subComponents/managers.vue')
);

Vue.component(
    'customers',
    require('./manager/subComponents/customers.vue')
);
Vue.component(
    'stocks',
    require('./manager/subComponents/stocks.vue')
);
//---  Vue Components ---------------------------------------------------------->





//--- Vue ProgressBar -------------------------------------------------------------->
    Vue.use(VueProgressBar, {
        color: 'rgb(143, 255, 199',
        failedColor: 'red',
        height: '10px'
    })
//--- Vue ProgressBar -------------------------------------------------------------->





//------------- Vue Custom Event-------------------------------------------------//
let Fire = new Vue();
window.Fire = Fire;





//--- Vue Filters -------------------------------------------------------------->
    Vue.filter('upText', function(text){
        //return text.toUpperCase();  <----- this is to make everything capital
        return text.charAt(0).toUpperCase() + text.slice(1);
    });
    Vue.filter('myDate', function(created){
        return moment(created).format('MMMM Do YYYY, h:mm:ss a')
    });
//--- Vue Filters -------------------------------------------------------------->





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
