import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
import store from "./components/store/store";

require('./bootstrap');

window.Vue = require('vue');
// let particles = window.particlesJS = require('particlesjs/dist/particles.min');
//
// console.log('pa', particles);
//
// particles.load('particles-js', './partials/particles.json', function() {
//     console.log('callback - particles.json config loaded');
// });


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('main-component', require('./components/main/main-componet.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('content-tabs', require('./components/main/content-tabs.vue').default);

// Translation provided by Vuetify (javascript)
import pt from 'vuetify/es5/locale/pt.js'



// Helpers
import colors from 'vuetify/es5/util/colors'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

Vue.use(Vuetify, {
    iconfont: 'md',
    lang: {
        locales: {pt},
        current: 'pt'
    },
    theme: {
        primary:   colors.red.darken1,  // #E53935
        secondary: colors.red.lighten4, // #FFCDD2
        accent:    colors.indigo.base   // #3F51B5
    }
})
const app = new Vue({
    store,
    el: '#app',
    data () {
        return {
           hello: 'Hello World'
        }
    },
});
