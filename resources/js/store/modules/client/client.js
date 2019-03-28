
//client module

const state = {
    clients:[],
    client:[],
  };
const getters = {
    Clients(state){
      return state.clients;
    },
    Client(state){
      return state.client;
    }
  };
const actions = {
    clients(context){//permission.index route laravel
      axios.get('/client/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('clients', response.data.clients);
      });
    },
    ClientById(context, payload){
        axios.get('/client/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('client', response.data.client);
              });
    }

  }
const mutations = {
    clients(state, data){
      return state.clients = data;
    },
    client(state, data){
      return state.client = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};




