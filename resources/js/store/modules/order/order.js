
//order module

const state = {
    orders:[],
    order:[],
  };
const getters = {
    Orders(state){
      return state.orders;
    },
    Order(state){
      return state.order;
    }
  };
const actions = {
    orders(context){//permission.index route laravel
      axios.get('/order/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('orders', response.data.orders);
      });
    },
    OrderById(context, payload){
        axios.get('/order/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('order', response.data.order);
              });
    }

  }
const mutations = {
    orders(state, data){
      return state.orders = data;
    },
    order(state, data){
      return state.order = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};





