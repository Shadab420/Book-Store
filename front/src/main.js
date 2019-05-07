import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import VueResource from 'vue-resource'
import { routes } from './router.js'
import jQuery from 'jquery'
import store from './storage/store.js'

global.$ = jQuery

Vue.use(VueRouter)
Vue.use(VueResource)

Vue.http.options.root = 'http://localhost:8000'

const router = new VueRouter({ 
	routes
	// linkActiveClass: 'active'
})




new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
