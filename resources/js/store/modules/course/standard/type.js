
//bureautype module

const state = {
    types:[],
  };
const getters = {
    Types(state){
      return state.types;
    },
  };
const actions = {
    types(context){//permission.index route laravel
      axios.get('/type/get')
      .then((response)=>{
        // console.log(response.data)
        context.commit('types', response.data.types);
      });
    },
  };
const mutations = {
    types(state, data){
      return state.types = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};







