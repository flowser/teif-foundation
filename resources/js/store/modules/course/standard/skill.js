
//bureauskill module

const state = {
    skills:[],
  };
const getters = {
    Skills(state){
      return state.skills;
    },
  };
const actions = {
    skills(context){//permission.index route laravel
      axios.get('/skill/get')
      .then((response)=>{
        // console.log(response.data)
        context.commit('skills', response.data.skills);
      });
    },
  };
const mutations = {
    skills(state, data){
      return state.skills = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};







