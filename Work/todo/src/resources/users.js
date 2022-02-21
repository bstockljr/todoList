import api from '@/resources/resources.js'

export default {
    getUsers(){
        return api.get('users')
    },
}