<template>
  <div class="home">

    <auth />
    <counter />
    <add />
    <list />
    
  </div>
</template>

<script>
import Auth from '@/components/Auth.vue'
import Add from '@/components/Add.vue'
import List from '@/components/List.vue'
import Counter from '@/components/Counter.vue'

export default {
  name: 'Home',
  components: {

    Add, List, Auth, Counter
    
    
  }
}
</script>

<style scoped>
  
  
</style>
