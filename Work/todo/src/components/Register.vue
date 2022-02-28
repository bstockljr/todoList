<template>
    <div>
        <router-link :to="{ name:'Home'}" class="nav-link">Home</router-link>
        <div class="container"> 
            <div class="row">
                <div class="col-6">
                    <div class="logBox">
                        <p>Register</p>
                        <!-- //NAME -->
                        <p><input 
                        v-model="newAd.name"
                        label="New user:" 
                        type="text" 
                        placeholder="username:"></p>

                        <!-- //email -->
                        <p><input 
                        v-model="newAd.email"
                        label="email:" 
                        type="email" 
                        placeholder="email:"></p>
                        
                        <!-- //Password -->
                        <p><input
                        v-model="newAd.password"
                        label="Password:"
                        type="password"
                        placeholder="password"></p>
                        <p>
                            <button @click="newAdmin()" 
                            class="button"> Add </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import AdminResources from '@/resources/admins.js'

export default {
    name: "Register",
    
     data(){
    return {

      newAd:{
        name:"", 
        email:"",
        password:""
      },
  }},

    methods: {
        async newAdmin(){
            let res = await AdminResources.createAdmin(this.newAd);
                if(res.status){
                    this.newAd.name = "";
                    this.newAd.email = "";
                    this.newAd.password = "";
       }
     }
   },
}
</script>
<style>
 .logBox{
        height: 220px;
        background: rgba(0, 0, 0, 0.118);
        backdrop-filter: 30px;
        border: none;
        border-radius: 35px;
    }

    .button{
        width: 80px;
        height: 30px;
        justify-content: center;
        align-content: center;
        color: white;
        background-color: green;
        border: none;
        border-radius: 10px;
    }
    
</style>