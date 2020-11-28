import API from "../../api/candidates";
import _ from "lodash";

// initial state
// shape: [{ id, quantity }]
const state = () => ({
  items: [],
});

// getters
const getters = {
  candidate: (state) => {
    return (id) => {
      return _.find(state.items, { id: id });
    };
  },
};

// actions
const actions = {
  async getCandidates(state) {
    let data = await API.get();
    console.log(data);
    state.commit("updateCandidates", data.data.data);
  },
};

// mutations
const mutations = {
  updateCandidates(state, data) {
    state.items = data;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
