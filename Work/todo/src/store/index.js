import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate"
import axios from 'axios'
import VueAxios from 'vue-axios'
import todosResouce from '@/resources/todos.js' 
// import { createStore } from 'vuex'
// import Cookies from 'js-cookie';
// Vue.use(VueAxios, axios)




export default new Vuex.Store({
  state: {

    todos:[],
    loggedAdmin:{},
    loggedIn: false,
    
},


  //getters
  getters:{
    allTodos:(state) => state.todos,
    todoCount: state => { return state.todos.length },
    Types:(state) => state.userTypes,

    adminFromState:(state) => state.loggedAdmin,
    logStatus:(state) => state.loggedIn,
    
  }, 
  

  //actions
  actions: {

    async getTodos({commit}){
      let response = await todosResouce.getTodos();
      let todos = response.data;
      commit("get_todos", todos);
    },




    setLoggedAdmin({commit}, data){
      commit("set_loggedAdmin", data)
    },

    setLogStatus({commit}, status){
      commit("set_logStatus", status)
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
//let response = await todos.getTodos(); must be moved to actions!!!!
  },
  
  
  //mutations
  mutations: {

    get_todos(state, todos) {
      state.todos = todos;
    },

    set_loggedAdmin(state, data){
      state.loggedAdmin = data;
    },

    set_logStatus(state, status ){
      state.loggedIn = status;
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
