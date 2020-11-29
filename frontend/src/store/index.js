import Vue from 'vue'
import Vuex from 'vuex'
import applications from './modules/applications'
import vacancies from './modules/vacancies'
import candidates from './modules/candidates'
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    applications,
    vacancies,
    candidates
  },
  strict: debug
})