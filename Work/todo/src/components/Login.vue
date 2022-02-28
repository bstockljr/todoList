<template >
    <div>
        <router-link :to="{ name:'Home'}" class="nav-link">Home</router-link>
        <div class="container">
            <div class="row pt-5">
                <div class="col-5 logBox">
                    <div class="">
                        <p>Login</p>
                        <!-- //NAME -->
                        <p><input 
                        v-model="newLog.email"
                        label="email:" 
                        type="email" 
                        placeholder="email:">admin@test.com</p>
                    
                        <!-- //Password -->
                        <p><input
                        v-model="newLog.password"
                        label="Password:"
                        type="password"
                        placeholder="password"></p>
                        <p>
                            <button 
                            @click="newLogin()"
                            class="d-flex button"> Login 
                            </button>
                        </p>
                        <p  v-if="showError">
                            {{message}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import admins from '@/resources/admins.js'
import {mapActions} from 'vuex'

export default {
    name: "Login",

    data(){
        return {
            newLog:{ 
                email:"",
                password:""
            },
            showError : false, 
            message : '',
        } 
    } ,

    methods: {
        ...mapActions(["setLoggedAdmin", "setLogStatus"]),

        showConsole(){
            console.log(this)
        },

        async newLogin(){
            let response = await admins.login(this.newLog);
            this.showConsole();
            if(response.data.status){
                this.setLogStatus(true);
                this.setLoggedAdmin(response.data.admin);
                this.newLog.email = "";
                this.newLog.password = "";
                this.showError = false;
                this.$router.push({name: 'Home'});
            }else{
                this.showError = !response.data.status;
                this.message = response.data.errorMessage;
                this.setLogStatus(response.data.status);
            }
        }
    },
}
</script>
<style>

    .logBox{
        height: 220px;
        padding: 40px;
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