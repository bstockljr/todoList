<template>
    <div>
        <ul class="nav NavBar">
            <li class="nav-item">
                <a class="nav-link"
                href="#"
                @click.prevent="logOutFunction()"
                v-if="$store.getters.logStatus">Logout</a>
            </li>
            <li class="nav-item" v-if="!$store.getters.logStatus">
                <router-link :to="{ name: 'Login'}" class="nav-link">LogIn</router-link>
            </li>
            <li class="nav-item" v-if="!$store.getters.logStatus">
            <router-link :to="{ name:'Register'}" class="nav-link">Register</router-link>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" v-if="$store.getters.logStatus">Hello {{$store.getters.adminFromState.name}}</a>
            </li>
        </ul>
    </div>
</template>
<script>
    import {mapActions} from 'vuex';
    

export default {
    name: 'Auth',

    methods: {
        ...mapActions(["setLoggedAdmin", "setLogStatus"]),
        logOutFunction(){
            this.setLogStatus(false);
            this.setLoggedAdmin({});
            this.$router.push({name: 'Login'});
        }
    },





}
</script>
<style>
.NavBar{
    display: flex;
    flex-direction: row-reverse;
    background: rgba(22, 38, 39, 0.076);
    backdrop-filter: 30px;
    -webkit-box-shadow: 0px 10px 13px -7px #0000006d, 0px -39px 0px -30px rgba(0,0,0,0.02); 
    box-shadow: 0px 10px 13px -7px #00000058, 0px -39px 0px -30px rgba(0,0,0,0.02);

}


    
</style>



