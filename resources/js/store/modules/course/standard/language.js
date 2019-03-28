
//bureaulanguage module

const state = {
    languages:[],
  };
const getters = {
    Languages(state){
      return state.languages;
    },
  };
const actions = {
    languages(context){//permission.index route laravel
      axios.get('/language/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('languages', response.data.languages);
      });
    },
  };
const mutations = {
    languages(state, data){
      return state.languages = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};







