import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate"
import axios from 'axios'
import VueAxios from 'vue-axios'
import todos from '@/resources/todos.js' 
// import { createStore } from 'vuex'
// import Cookies from 'js-cookie';
// Vue.use(VueAxios, axios)




export default new Vuex.Store({
  state: {

    todos:[],

  
},


  //getters
  getters:{
    allTodos:(state) => state.todos,
    todoCount: state => { return state.todos.length },
    Types:(state) => state.userTypes,
    
  }, 
  

  //actions
  actions: {

    getTodos({commit}){
      commit("get_todos");
    },

    // getUsers({commit}){
    //   commit("get_users");
    // },

    // getAdmins({commit}){
    //   commit("get_admins");
    // }





    // addTodo({ commit }, todo){
    //   commit("add_todo", todo);
      
    // },
    
    // deleteTodo({ commit }, id){
    //   commit("delete_todo", id);
    // },
     
    
    




  },
  
  
  //mutations
  mutations: {


    async get_todos(state) {
      let response = await todos.getTodos();
      state.todos = response.data;
    }




    // async add_todo(state, todo){
    //   let res = await todos.createTodo(todo);
    //   return res;
    // },
    // delete_todo(state, id) {
    //   state.todos = state.todos.filter((todo) => todo.id!= id);
    // },
    // }
 
  },



  //modules
  modules: {
  },



  plugins: 
  [createPersistedState()],
})

// export default createStore({
  

// })
