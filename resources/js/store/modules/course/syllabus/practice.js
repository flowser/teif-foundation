
//bureaupractice module

const state = {
    practices:[],
  };
const getters = {
    Practices(state){
      return state.practices;
    },
  };
const actions = {
    practices(context){//permission.index route laravel
      axios.get('/practice/get')
      .then((response)=>{
        // console.log(response.data)
        context.commit('practices', response.data.practices);
      });
    },
  };
const mutations = {
    practices(state, data){
      return state.practices = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};








