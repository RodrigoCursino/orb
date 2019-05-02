require('./bootstrap');

import swal from 'sweetalert';
import money from 'v-money';
import Vuetify from 'vuetify';
import VeeValidate from 'vee-validate'
require('vuetify/dist/vuetify.min.css');
import store  from "./components/store/store";
import router from "./router";
import HTTP from './http';

window.http = HTTP;

window.Vue  = require('vue');
Vue.use(money, {precision: 2})
window.swal = swal;

window.EventBus = window.Bus = new Vue();

Vue.component('main-component', require('./components/main/main-componet.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('content-tabs', require('./components/main/content-tabs.vue').default);
Vue.component('notification', require('./components/shared/notifications').default);

// Translation provided by Vuetify (javascript)
import pt from 'vuetify/es5/locale/pt.js'



// Helpers
import colors from 'vuetify/es5/util/colors'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

// Vuetify configurações vizuais como cor e outras coisas
Vue.use(Vuetify, {
    iconfont: 'md',
    lang: {
        locales: {pt},
        current: 'pt'
    },
    theme: {
        primary:   colors.purple.darken1,  // #E53935
        secondary: colors.red.lighten4, // #FFCDD2
        accent:    colors.indigo.base,   // #3F51B5
        danger:    colors.red.base,   // #3F51B5
    }
});

Vue.use(VeeValidate);


window.App = new Vue({
    store,
    el: '#app',
    router,
});

App.$router.push('/');
