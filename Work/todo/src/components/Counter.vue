<template>
    <div class="counterPosition">
        <div class="counter">   
         {{$store.getters.todoCount}} 
        </div> 
    </div>
</template>
<script>


export default {
    name: "Counter",  
}
</script>
<style>

.counterPosition{
    display: flex;
    flex-direction: row-reverse;
    justify-content: end;
}
.counter{
    display: flex;
    justify-content: center;
    font-size: 20px;
    background: rgb(214, 216, 216);
    border-radius: 50px;
    width: 30px;
    margin: 10px;
}
</style>