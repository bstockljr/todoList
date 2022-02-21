<template>
  <div class="add"> 
    <div class="addForm">

      <span> New item:
        <input
        v-model="todo.item" 
        class="inputAdd" 
        type="text">
      </span>
      <span>
        <el-select 
        v-model="todo.user_type"
        @change="userTypeControll()"> 
          <el-option value="Admin"> Admin </el-option>
          <el-option value="user"> User </el-option> 
        </el-select> 
      </span>
      <el-select  
      v-model="todo.user" 
      multiple placeholder="Select">
        <el-option
          v-for="item in items"
          :key="item.id"
          :label="item.name"
          :value="item.id"
        >
        </el-option>
      </el-select>
      <!-- <select v-model="todo.user"
      class="form-select" multiple aria-label="Default select example">
          <option 
          v-for="item in items" 
          :key="item.id"
          :value="item.id"
          :label="item.name"> 
          </option> 
      </select>  -->  
      <span> 
        <button @click="createTodo()" class="btnadd"> + </button>
      </span>


    </div>
  </div>

</template>

<script>

import { mapActions } from 'vuex';
import { v1 } from 'uuid';
import {mapState} from 'vuex'
import todos from '@/resources/todos.js' 
import users from '@/resources/users.js'
import admins from '@/resources/admins.js'


export default {
  name: 'Add',
  components: {
   
  },


  async mounted () {
      
    await this.getUser(),
    await this.getAdmin()

  },


  data(){
    return {

      todo:{
        item:"", 
        user:"",
        user_type:"user"
      },

      allUsers:[],
      allAdmins:[],
      
      items:[],
    }
  },


  //methods
  methods:{

    ...mapActions(["getTodos"]),

    async createTodo(){
      let res = await todos.createTodo(this.todo);
        if(res.status){
          await this.getTodos()
          this.todo.item = "";
          this.todo.user = "";
          this.todo.user_type = "user";
          this.items = this.allUsers;
        }
    },

    async getUser(){
        let response = await users.getUsers();
          if(response.status){
            this.allUsers = response.data;
            this.items = this.allUsers;
            console.log("user fetch Ok")
          }
    },

    async getAdmin(){
        let response = await admins.getAdmins();
          if(response.status){
            this.allAdmins = response.data;
            console.log("admin fetch Ok")
          }
    },


    //change user type
    async userTypeControll(){
        if(this.todo.user_type === 'user'){
          this.items = this.allUsers;
        }
        else{
          this.items= this.allAdmins;
          }
      }
  }
    
}

</script>

<style scoped>

.addForm{
  font-size: 20px;
  font-weight: bold;
  display: flex;
  justify-content: space-evenly;
  align-items:  center;
  background: #42a0ff74;
  margin:25px 50px;
  height: 40px;
}

.btnadd{ 
 
  color: rgb(255, 255, 255);
  background:#0073df ;
  height: 30px;
  width: 30px;
  border: none;
  border-radius: 3px;

}

.btnadd:hover{
  background: #02396d ;
  transition: 200ms;
  
}

.inputAdd{
  width: 400px;
}


</style>
