
//bureauaccessibility module

const state = {
    accessibilities:[],
  };
const getters = {
    Accessibilities(state){
      return state.accessibilities;
    },
  };
const actions = {
    accessibilities(context){//permission.index route laravel
      axios.get('/accessibility/get')
      .then((response)=>{
        // console.log(response.data)
        context.commit('accessibilities', response.data.accessibilities);
      });
    },
  };
const mutations = {
    accessibilities(state, data){
      return state.accessibilities = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};







