import { createStore } from 'vuex'
import axios from 'axios'
export default createStore({
  state: {
    apiUrl: 'http://127.0.0.1:8000/api',
    products: [],
  },
  getters: {
    getProducts: state => {
      return axios.get(state.apiUrl + '/products')
          .then(response => {
              state.products = response.data;
          })
          .catch(error => {   
              console.error("Error fetching products:", error);
          });
  },
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
})
