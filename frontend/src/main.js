import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

// Axios setup
import Axios from "axios";
Axios.interceptors.request.use(
  (config) => {
    let token = localStorage.getItem("user-token");
    if (token) {
      config.headers["Authorization"] = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
)

import "tailwindcss/tailwind.css"
import './assets/fonts/stylesheet.css'
// import Unicon from 'vue-unicons'

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
