<template>
  <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <div>Simular investimento</div>
        <button type="button" class="btn-close" @click="fechar">x</button>
      </header>

      <section class="modal-body">
        <div class="camposSimular">
          <label for="dtValor">Valor do Investimento: </label>
          <input
            type="number"
            id="dtValor"
            v-model="valor"
            @change="verificador"
            placeholder="250000,50"
          />
          <button type="button" class="btn-simular" @click="simulacao()">
            Simular
          </button>

        
        </div>
        <div v-if="resultados">
          <h3>Resultado da Simulação</h3>
          <div class="resultadoSimulacao">
            <p><span>Projeto:</span> {{infSimulacaoProjeto.nome}}</p>
            <p><span>Valor do projeto:</span> {{infSimulacaoProjeto.valor}}</p>
            <p><span>Risco:</span> {{infSimulacaoProjeto.risco}}</p>
            <p><span>Valor investido:</span> {{valorSimulado}}</p>
            <p><span>Retorno do Investimento (ROI):</span> {{roi}} </p>
            <p><span>Percentual % (ROI):</span> {{percentualRoi}} </p>
          </div>
        </div>

      </section>

      <footer class="modal-footer">
        <slot name="footer"> </slot>
        <button type="button" class="btn-cinza-fechar" @click="fechar">
          Fechar
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
    infSimulacaoProjeto: Object
  },

  data() {
    return {
     
        valor: "0,00",
        valorSimulado: "0,00",
        resultados: false,
        roi: "0,00",
        percentualRoi: 0,

      
    };
  },

  methods: {
    fechar() {
      this.$emit("close");
      this.resultados = false
      this.valor = "0,00";
    },
    verificador() {
      if (parseFloat(this.valor) < 0) {
        alert("Valor do Projeto não deve ser menor que: 0");
        this.valor = "0,00";
      }
    },
    simulacao(){
      if(parseFloat(this.valor) < parseFloat(this.infSimulacaoProjeto.valor)){
          alert("Valor do investimento não deve ser menor que: " + this.infSimulacaoProjeto.valor);
        this.valor = "0,00";
      }else{
        this.resultados = true
        this.valorSimulado = this.valor
        this.calculoRoi()
        console.log("foi")
      }
    },

    
     calculoRoi(){
      let risco = this.infSimulacaoProjeto.risco;
      switch(risco){
        case 0:
            this.roi =  ((parseFloat(this.valorSimulado) * 0.05))
            this.percentualRoi = 5
          break;
        case 1:
            this.roi =  ((parseFloat(this.valorSimulado) * 0.10))
            this.percentualRoi = 10
          break;
        case 2:
            this.roi =  ((parseFloat(this.valorSimulado) * 0.20))
            this.percentualRoi = 20
          break;
      }
      
    }
     
  },
};
</script>

<style>
h3{
  text-align: center;
  font-size: 1.5rem;
  font-weight: 700;
  margin-top: 1rem;
}
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

.btn-simular {
  color: rgb(255, 255, 255);
  background: #2EA338;
  border: 1px solid #2EA338;
  padding: 0.3rem;
  border-radius: 0.5rem;
  margin-right: 1rem;
  width: 18rem;
  justify-content: center;
}

.camposSimular > input {
  width: 12rem;
  margin-top: 1rem;
  margin-bottom: 0.5rem;
  align-items: center;
  display: inline-block;
  flex-direction: inherit;
  
  border-radius: 0.5rem;
  margin-right: 1rem;
}

.resultadoSimulacao > input >span {
  font-weight: 600;
}
@media only screen and (max-width: 600px) {
  .btn-simular {
  color: rgb(255, 255, 255);
  background: #2EA338;
  border: 1px solid #2EA338;
  padding: 0.3rem;
  border-radius: 0.5rem;
  margin-right: 1rem;
  width: 100%;
}
.resultadoSimulacao > p{
  margin-bottom: 1rem;
}
  
}
.resultadoSimulacao > p >span {
  font-weight: 800;
}
</style>