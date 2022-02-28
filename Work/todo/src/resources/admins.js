import api from '@/resources/resources.js'

export default {
    getAdmins(){
        return api.get('admins')
    },
    createAdmin(newAdmin){
        return api.post('createAdmin',newAdmin)
    },
    login(newLog){
        return api.post('login',newLog)
    },
    // logout(endLog){
    //     return api.post('logout',endLog)
    // }


}