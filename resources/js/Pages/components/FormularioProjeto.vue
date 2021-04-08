<template>
        <section class="form-body">
        <div>
          <form class="formProjeto" @submit.prevent="submit">
            <label for="nome">Nome do Projeto: </label>
            <input type="text" id="nome" name="nome" v-model="form.nomeProjeto"  required />
            <div>
              <label for="dtInicio">Data de inicio: </label>
              <input type="date" id="dtInicio" v-model="form.dataInicio"  required />

              <label for="dtFim">Data de término: </label>
              <input type="date" id="dtFim" v-model="form.dataFim"  required />
            </div>
            <label for="dtValor">Valor do Projeto: </label>
            <input
              type="number"
              id="dtValor"
              v-model="form.valor"
              @change="verificadorPositivo"
              placeholder="250000,50"
               required
            />

            <label for="risco">Risco: </label>
            <select  @change="form.risco = $event.target.value"  required>
              <option  v-if="autoPreencher" selected >{{autoPreencher.risco}}</option>
              <option  v-else selected >Escolha</option>
              <option value="0">0 - (Baixo)</option>
              <option value="1">1 - (Médio)</option>
              <option value="2">2 - (Alto)</option>
              
            </select>
 
            <label for="participantes">Participantes: </label>
            <input
              type="text"
              id="participantes"
              v-model="form.participantes"
              placeholder="Fulano; Sicano; Beltrano"
              required
            />
          </form>
        </div>
      </section>



     <footer class="form-footer">

        <button v-if="autoPreencher" type="submit" class="btn-azul-enviar" @click="submitEditar">
          Editar
        </button>

        <button v-else type="submit" class="btn-azul-enviar" @click="submitCadastro">
          Cadastrar
        </button>
      
      </footer>

  
</template>
<script>

import Input from "../../Jetstream/Input.vue";
export default {
  components: { Input },
  props: {
    dados: String,
    autoPreencher: Object,
  },

  data() {
    return {
      form: {
        id: null,
        nomeProjeto:  null,
        dataInicio: null,
        dataFim: null,
        valor: "0,00",
        risco: "",
        participantes: null
      },
    };
  },
  created: function(){
    this.atribuirAutoPreenchimento();
  },

    methods: {
      atribuirAutoPreenchimento(){
        if(typeof this.autoPreencher === 'undefined'){
          console.log("vazio")
        }else{
          this.form.id = this.autoPreencher.id_projeto
          this.form.nomeProjeto = this.autoPreencher.nome
          this.form.dataInicio = this.autoPreencher.data_inicio
          this.form.dataFim = this.autoPreencher.data_fim
          this.form.valor = this.autoPreencher.valor
          this.form.risco = this.autoPreencher.risco
          this.form.participantes = this.autoPreencher.participantes
        }
      },
        submitCadastro() {
        this.$inertia.post('/adicionar', this.form)
        },
        submitEditar() {
        this.$inertia.post('/efetivarEdicao', this.form)
        },
        verificadorPositivo(){
            if(parseFloat(this.form.valor)<0){
                alert("Valor do Projeto não deve ser menor que: 0")
                this.form.valor = '0,00'
            }
        },
    

    }


  
};
</script>

<style>
.form-backdrop {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 3;
}

.form {
  background: #ffffff;
  box-shadow: 2px 2px 20px 1px;
  overflow-x: auto;
  display: flex;
  flex-direction: column;
  width: 45rem;
}

.form-header,
.form-footer {
  padding: 15px;
  display: flex;
  flex-direction: row;
}

.form-header {
  position: relative;
  border-bottom: 1px solid #eeeeee;
  font-weight: 600;
  color: #000000;
  justify-content: space-between;
}

.form-footer {
  border-top: 1px solid #eeeeee;
  justify-content: flex-end;
  align-items: center;
  display: flex;
  flex-direction: row;
}

.form-body {
  position: relative;
  padding: 1rem 1rem;
}

.btn-close {
  position: absolute;
  top: 0;
  right: 0;
  border: none;
  font-size: 20px;
  padding: 10px;
  cursor: pointer;
  font-weight: bold;
  color: #494646;
  background: transparent;
}


.btn-azul-enviar {
  color: rgb(255, 255, 255);
  background: #6875f5;
  border: 1px solid #6875f5;
  padding: 0.3rem;
  border-radius: 2px;
  margin-right: 1rem;
  
}

.formProjeto > input,
select {
  width: 100%;
  margin-bottom: 0.5rem;
  align-items: center;
  display: flex;
  border-radius: 0.5rem;
}

.formProjeto > div > input {
  width: 12rem;
  margin-top: 1rem;
  margin-bottom: 0.5rem;
  align-items: center;
  display: inline-block;
  flex-direction: inherit;

  border-radius: 0.5rem;
  margin-right: 1rem;
}

@media only screen and (max-width: 600px) {
  .formProjeto > div > input {
    width: 100%;
    margin-top: 1rem;
    margin-bottom: 0.5rem;
    align-items: center;
    display: flex;
    flex-direction: inherit;

    border-radius: 0.5rem;
    margin-right: 1rem;
  }
}

.formProjeto > label,
div > label {
  font-weight: 600;
}
</style>