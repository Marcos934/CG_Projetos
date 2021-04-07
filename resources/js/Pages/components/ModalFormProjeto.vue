<template>
  <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <div v-if="dados">Editando: {{ dados.name }}</div>
        <div v-else>Adicinando novo projeto</div>
        <button type="button" class="btn-close" @click="fechar">x</button>
      </header>

      <section class="modal-body">
        <div v-if="dados">Editando dados</div>
        <div v-else>
          <form class="formProjeto">
            <label for="nome">Nome do Projeto: </label>
            <input type="text" id="nome" v-model="form.nomeProjeto" />

            <label for="dtInicio">Data de inicio: </label>
            <input type="date" id="dtInicio" v-model="form.dataInicio" />

            <label for="dtFim">Data de término: </label>
            <input type="date" id="dtFim" v-model="form.dataFim" />

            <label for="dtValor">Valor do Projeto: </label>
            <input
              type="text"
              id="dtValor"
              v-model="form.valor"
              placeholder="250000,50"
            />

            <label for="risco">Risco: </label>
            <select id="risco" v-model="form.risco">
               <option selected>Escolha</option>
              <option value="0">Baixo (0)</option>
              <option value="1">Médio (1)</option>
              <option value="2">Alto (2)</option>
            </select>


             <label for="participantes">Participantes: </label>
             <input type="text" id="participantes" v-model="participantes" placeholder="Fulano; Sicano; Beltrano" >



          </form>
        </div>
      </section>

      <footer class="modal-footer">
        <slot name="footer"> </slot>
        <button type="button" class="btn-cinza-fechar" @click="fechar">
          Fechar
        </button>
        <button type="button" class="btn-azul-enviar" @click="fechar">
          Enviar
        </button>
      </footer>
    </div>
  </div>
</template>
<script>
import Input from "../../Jetstream/Input.vue";
export default {
  components: { Input },
  props: {
    dados: String,
  },

  data() {
    return {
      form: {
        nome: null,
        valor: "0,00",
      },
    };
  },

  methods: {
    fechar() {
      this.$emit("close");
    },
  },
};
</script>

<style>
.modal-backdrop {
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

.modal {
  background: #ffffff;
  box-shadow: 2px 2px 20px 1px;
  overflow-x: auto;
  display: flex;
  flex-direction: column;
  width: 45rem;
}

.modal-header,
.modal-footer {
  padding: 15px;
  display: flex;
  flex-direction: row;
}

.modal-header {
  position: relative;
  border-bottom: 1px solid #eeeeee;
  font-weight: 600;
  color: #000000;
  justify-content: space-between;
}

.modal-footer {
  border-top: 1px solid #eeeeee;
  justify-content: flex-end;
  align-items: center;
  display: flex;
  flex-direction: row;
}

.modal-body {
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

.btn-cinza-fechar {
  color: rgb(0, 0, 0);
  background: #dfdfdf;
  border: 1px solid #dfdfdf;
  padding: 0.3rem;
  border-radius: 2px;
  margin-right: 0.5rem;
}

.btn-azul-enviar {
  color: rgb(255, 255, 255);
  background: #6875f5;
  border: 1px solid #6875f5;
  padding: 0.3rem;
  border-radius: 2px;
  margin-right: 1rem;
}

.formProjeto > input , select  {
  width: 100%;
  margin-bottom: 0.5rem;
  align-items: center;
  display: flex;
  border-radius: 0.5rem;
}

.formProjeto > label {
  font-weight: 600;
}
</style>