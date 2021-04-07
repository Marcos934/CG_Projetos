<template>
<div>
    <div v-if="mgs = 'v'"> 
        Olá Mundo {{mgs}}
    </div>
    <div v-else> 
        Olá Mundo 2
    </div>
</div>  
</template>
<script>
export default {
    props:{
        msg: String,
    }
   
}
</script>
<style>

</style>