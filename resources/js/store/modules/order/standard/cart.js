
//cartItem module

const state = {
    cartItems:[],
    cartItem:[],
    subTotal:[],
    Total:[],
  };
const getters = {
    CartItems(state){
      return state.cartItems;
    },
    Cart(state){
      return state.cartItem;
    },
    subTotal(state){
      return state.subTotal;
    },
    Total(state){
      return state.Total;
    }
  };
const actions = {
    cartItems(context){//permission.index route laravel
      axios.get('/cart/get')
      .then((response)=>{
        console.log(response.data, 'jj')
        context.commit('cartItems', response.data.cartItems);
        context.commit('subTotal', response.data.subTotal);
        context.commit('Total', response.data.Total);
      });
    },
    CartItemById(context, payload){
        axios.get('/cart/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('cartItem', response.data.cartItem);
              });
    }

  }
const mutations = {
    cartItems(state, data){
      return state.cartItems = data;
    },
    cartItem(state, data){
      return state.cartItem = data;
    },
    subTotal(state, data){
      return state.subTotal = data;
    },
    Total(state, data){
      return state.Total = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};





