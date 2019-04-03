
//bureausyllabus module

const state = {
    syllabi:[],
  };
const getters = {
    Syllabi(state){
      return state.syllabi;
    },
  };
const actions = {
    syllabi(context){//permission.index route laravel
      axios.get('/syllabus/get')
      .then((response)=>{
        // console.log(response.data)
        context.commit('syllabi', response.data.syllabi);
      });
    },
  };
const mutations = {
    syllabi(state, data){
      return state.syllabi = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};








