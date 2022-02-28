<template>
  <div id="">   
    <div v-for="todo in allTodos" :key="todo.id" class="items" v-bind:style=" todo.completed ? {'background': '#255030'}:'' " >
        <span class="itemTxt">
            <input type="checkbox" class="mx-5" v-model="todo.completed" @change="updateTodo(todo)"   >
            <span v-bind:style=" todo.completed ? {'text-decoration': 'line-through'}:'' ">{{todo.item}}</span>      
        </span>

       
          <span>
              <el-select :disabled="todo.completed"
                  v-model="todo.user_type">
                    <el-option value="Admin"> Admin </el-option>
                    <el-option value="user"> User </el-option>
                    
              </el-select> 
          </span>
              <el-select 
              v-model="todo.usersIds "   
              :disabled="todo.completed"
              v-if="todo.user_type === 'user'" 
              multiple placeholder="Select">
                  <el-option 
                  v-for="user in allUsers" 
                  :key="user.id"
                  :value="user.id"
                  :label="user.name"> 
                  </el-option> 
                </el-select>  
                <el-select v-model="todo.adminsIds"
                :disabled="todo.completed"
                v-if="todo.user_type === 'Admin'" 
                multiple placeholder="Select">
                  <el-option 
                  v-for="admin in allAdmins" 
                  :key="admin.id"
                  :value="admin.id"
                  :label="admin.name"> 
                  </el-option> 
              </el-select>  
          <span>
              <button @click="updateTodo(todo)" class="btnadd  ms-5 mx-1"> Ok </button>
          </span> 
          <span>
              <button @click="deleteTodo(todo.id)" class="btnDel  ms-5 mx-1"> x </button>
          </span>   
    </div>
  </div>
</template>

<script>
//------------------------------------------//
// import { computed } from '@vue/runtime-core'
import { mapActions, mapGetters } from 'vuex'
import todos from '@/resources/todos.js' 
import users from '@/resources/users.js'
import admins from '@/resources/admins.js'
//-----------------------------------------//
export default {

  name: 'List',
  

  //MOUNT
  async mounted () {
      
    await this.getTodos(),
    await this.getUserList(),
    await this.getAdminList()

  },

  data(){
    return{
      
      
      allUsers:[],
      allAdmins:[],
      

    }
  },

  methods: {
    

    async deleteTodo(todoid){
      let response = await todos.deleteTodo(todoid)
      if(response.status){
          await this.getTodos()
          console.log ("item deleted")
        }
    },


//-------------------------------------------------//

    async updateTodo(todo){
      
      let payload = {
        id:todo.id, 
        item:todo.item, 
        userUser:todo.usersIds,
        userAdmin:todo.adminsIds, 
        user_type:todo.user_type, 
        completed:todo.completed
      }

      let response = await todos.updateTodo(payload)
        if(response.status){
          await this.getTodos()
          console.log("updated")
        }
    },


    //-------------------------------------------------//

    async getUserList(){
        let response = await users.getUsers();
          if(response.status){
            this.allUsers = response.data;
            
          }
    },

    async getAdminList(){
        let response = await admins.getAdmins();
          if(response.status){
            this.allAdmins = response.data;
            
          }
    },

    // async TypeControll(todo){
    //     if(todo.user_type === 'user'){
    //       this.items = this.allUsers;
    //     }
    //     else{
    //       this.items= this.allAdmins;
    //       }
    //   },

    ...mapActions(["getTodos"]),
  },

//-----------------------------------------//
  computed:{
    ...mapGetters(["allTodos"])
  },
}

//-----------------------------------------//
</script>

<style scoped>
.items{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 10px 60px;
    background: #1b27335f;
    border-radius: 15px;
    -webkit-box-shadow: -10px 0px 13px -7px #0000003f, 10px 0px 13px -7px #000000, 0px 0px 3px -28px rgba(0,0,0,0); 
    box-shadow: -10px 0px 13px -7px #0000003f, 10px 0px 13px -7px #000000, 0px 0px 3px -28px rgba(0,0,0,0);
   

}

.itemTxt{
    display: flex;
    align-items: center;
    justify-content: start;
    height: 50px;
    width: 65vw;
    font-size: 28px ;
    color: lightgray;
    border-radius: 5px;
}

.itemTxt2{
    display: flex;
    justify-content: start;
    font-size: 20px;
}


.btnDel{
  color: aliceblue;
  height: 30px;
  width: 30px;
  border: none;
  border-radius: 8px;
  background: #9d04049c;
}

.btnDel:hover{
  background: #70090954 ;
  transition: 300ms;
}

.btnadd{ 
  display: flex;
  justify-content: center;
  align-items: center;
  color: rgb(255, 255, 255);
  background:#0073df60 ;
  height: 30px;
  width: 30px;
  border: none;
  border-radius: 8px;

}

.btnadd:hover{
  background: #02396d6b ;
  transition: 300ms;
  
}
.isCompleted{
  color: antiquewhite;
}

</style>