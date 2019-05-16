import '@babel/polyfill'
import 'es6-promise/auto'

import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
// ADMIN MDB
import * as VueGoogleMaps from 'vue2-google-maps'
import 'font-awesome/css/font-awesome.min.css'
import 'bootstrap-css-only/css/bootstrap.min.css'
import 'mdbvue/build/css/mdb.css'
// BOOTSTRAP-VUES
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


import Notifications from 'vue-notification'

Vue.use(BootstrapVue)
Vue.use(Notifications)
Vue.use(VueGoogleMaps, {
    load: {
        libraries: 'places'
    }
})

Vue.config.productionTip = false

new Vue({
    template: '<App/>',
    components: { App },
    router,
    store
}).$mount('#app')
