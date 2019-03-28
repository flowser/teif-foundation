
//bureauavailability module

const state = {
    availabilities:[],
  };
const getters = {
    Availabilities(state){
      return state.availabilities;
    },
  };
const actions = {
    availabilities(context){//permission.index route laravel
      axios.get('/availability/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('availabilities', response.data.availabilities);
      });
    },
  };
const mutations = {
    availabilities(state, data){
      return state.availabilities = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};






