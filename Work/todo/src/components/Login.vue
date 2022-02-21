<template >
    <div>
        <div class="container">
            <div class="row">
                <p>LogIn</p>
                <!-- //NAME -->
                <p><input 
                v-model="newLog.email"
                label="email:" 
                type="email" 
                placeholder="email:"></p>
               
                <!-- //Password -->
                <p><input
                v-model="newLog.password"
                label="Password:"
                type="password"
                placeholder="password"></p>
                <p>
                    <button 
                    @click="newLogin()"
                    class="btn btn-success "> Login 
                    </button>
                </p>
            </div>
        </div>
    </div>
</template>
<script>

import admins from '@/resources/admins.js'

export default {
    name: "Login",

     data(){
    return {
      newLog:{ 
        email:"",
        password:""
      },
  }},
  
    methods: {
        async newLogin(){
            let res = await admins.login(this.newLog);
                if(res.status){
                    this.newAd.email = "";
                    this.newAd.password = "";
       }
     }
   },
}
</script>
<style>
    .btn{
    width: 80px;
    height: 30px;

}
</style>