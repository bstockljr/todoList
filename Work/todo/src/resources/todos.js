import api from '@/resources/resources.js'

export default {
    getTodos(){
        return api.get('todos')
    },

    createTodo(todo){
        return api.post('todos',todo)
    },

    deleteTodo(id){
        return api.delete(`todos/${id}`)
    },

    updateTodo(todo){
        return api.put('todos',todo)
    }
}