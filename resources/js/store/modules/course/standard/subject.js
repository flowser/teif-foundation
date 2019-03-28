
//bureausubject module

const state = {
    subjects:[],
  };
const getters = {
    Subjects(state){
      return state.subjects;
    },
  };
const actions = {
    subjects(context){//permission.index route laravel
      axios.get('/subject/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('subjects', response.data.subjects);
      });
    },
  };
const mutations = {
    subjects(state, data){
      return state.subjects = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};







