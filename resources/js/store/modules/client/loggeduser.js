
//user module

const state = {
    user:[],
  };
const getters = {
    User(state){
      return state.user;
    }
  };
const actions = {
    logoutUser( { commit } ){
        // commit( 'setUserLoadStatus', 0 );
        commit( 'setAuthUser', {} );
    },
    // users(context){//permission.index route laravel
    //   axios.get('/user/get')
    //   .then((response)=>{
    //     console.log(response.data)
    //     context.commit('users', response.data.users);
    //   });
    // },
    // UserById(context, payload){
    //     axios.get('/user/show/'+payload)
    //           .then((response)=>{
    //               console.log(response.data);
    //               context.commit('user', response.data.user);
    //           });
    // }

  }
const mutations = {
    setAuthUser(state, data){
        // console.log('user', data)
      return state.user = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};





