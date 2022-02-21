<template>
    <div>
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
             <router-link :to="{ name: 'Login'}" class="nav-link">LogIn</router-link>
        </li>
        <li class="nav-item">
           <router-link :to="{ name:'Register'}" class="nav-link">Register</router-link>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">User</a>
        </li>
        </ul>

    </div>
</template>
<script>
export default {
    name: 'Auth',
}
</script>
<style lang="">
    
</style>