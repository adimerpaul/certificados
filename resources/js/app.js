
require('./bootstrap');
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('certificado', require('./components/certificado.vue').default);
const app = new Vue({
    el: '#app',
});
