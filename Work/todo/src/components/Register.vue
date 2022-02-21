<template>
    <div>
        <div class="container"> 
            <div class="row">
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
                    class="btn btn-primary "> Add </button>
                </p>
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
.btn{
    width: 60px;
    height: 30px;

}
    
</style>