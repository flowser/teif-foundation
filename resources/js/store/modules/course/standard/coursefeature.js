
//bureaufeature module

const state = {
    features:[],
  };
const getters = {
    CourseFeatures(state){
      return state.features;
    },
  };
const actions = {
    coursefeatures(context){//permission.index route laravel
      axios.get('/coursefeature/get')
      .then((response)=>{
        // console.log(response.data)
        context.commit('features', response.data.features);
      });
    },
  };
const mutations = {
    features(state, data){
      return state.features = data;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};







