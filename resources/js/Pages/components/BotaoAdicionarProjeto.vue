<template>
<div class="container md-auto sm:center">
 
        <!-- <button class="bt_adicionar_projeto" @click="abrirModal">Adicionar Projeto</button> -->
        <inertia-link href="/adicionar">
          <button class="bt_adicionar_projeto">Cadastrar Projeto</button>
        </inertia-link>
</div>

    

    <ModalFormProjeto
      v-show="isModalMostrar"
      @close="fecharModal"
    />

</template>
<script>
import Button from '../../Jetstream/Button.vue'
import ModalFormProjeto from  "@/Pages/components/ModalFormProjeto";


export default {
  components: { Button, ModalFormProjeto},
  
  data(){
    return {
      count: 0,
      isModalMostrar: false,
      }
  },
  methods:{
     abrirModal() {
        this.isModalMostrar= true;
      },
      fecharModal() {
      this.isModalMostrar = false;
    }
  }
   
}
</script>

<style>

.bt_adicionar_projeto{
    
    width: 15rem;
    text-align: center;
    padding: 1rem 1rem;
    border: 0.1rem solid white;
    color: white;
    border-radius: 0.5rem;
    background-color:#6875F5;
    font-size: 1rem;
    transition-duration: 0.5s;
    margin-left: 0.5rem;
    outline: none;
    margin-bottom: 1rem;
}
.bt_adicionar_projeto:hover{
    background-color:#3b4bda;
    outline: none;
}

</style>
