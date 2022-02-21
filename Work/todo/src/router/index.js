import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '@/views/Home.vue'
import Register from '@/components/Register.vue'
import Login from '@/components/Login.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/Register',
    name: 'Register',
    component: Register
  },
  {
    path: '/Login',
    name: 'Login',
    component: Login
  },

  
]



const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
