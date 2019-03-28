
//bureauschool module

const state = {
    schools:[],
  };
const getters = {
    Schools(state){
      return state.schools;
    },
  };
const actions = {
    schools(context){//permission.index route laravel
      axios.get('/school/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('schools', response.data.schools);
      });
    },
  };
const mutations = {
    schools(state, data){
      return state.schools = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};







