import API from '../../api/vacancies'
import _ from 'lodash';    

// initial state
// shape: [{ id, quantity }]
const state = () => ({
  items: [],
})

// getters
const getters = {
  vacancy: (state) => {
    return (id) => {
      _.find(state.items, {id: id})
    }
  },
  hasUnprocessed: (state) => {
    return state.items.filter(item => item.unprocessed_count > 0)
  },
  services: (state) => {
    return state.items.map(item => item.service)
  }
}

// actions
const actions = {
  async getVacancies(state) {
    let data = await API.get()
    console.log(data)
    state.commit('updateVacancies', data.data.data)
  }
}

// mutations
const mutations = {
  updateVacancies(state, data) {
      state.items = data
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}