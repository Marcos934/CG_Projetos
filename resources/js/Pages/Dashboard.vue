<template>
  <app-layout>
    <template #header>
      <link
        rel="stylesheet"
        type="text/css"
        href="../js/recursosDatatables/datatables.min.css"
      />

      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <template #body>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <BotaoAdicionarProjeto />
          <div
            class="bg-white overflow-hidden shadow-xl sm:rounded-sm ajustePadding"
          >
            <table id="listagem" class="stripe" style="width: 100%">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Data Inicio</th>
                  <th>Data Fim</th>
                  <th>Valor</th>
                  <th>Risco</th>
                  <th>Ação</th>
                </tr>
              </thead>

              <tbody>
                <tr
                  v-bind="index"
                  v-for="(dado, index) in dados"
                  :key="dado.id"
                >
                  <td>{{ dados[index].nome }}</td>
                  <td>{{ formatarDataIncio(index) }}</td>
                  <td>{{ formatarDataFim(index) }}</td>
                  <td>{{ dados[index].valor }}</td>
                  <td>{{ dados[index].risco }}</td>
                  <td>
                    <button class="btn-acao editar">Editar</button>
                    <button class="btn-acao excluir">Excluir</button>
                    <button class="btn-acao sInvestimento">
                      Simular investimento
                    </button>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>Data Inicio</th>
                  <th>Data Fim</th>
                  <th>Valor</th>
                  <th>Risco</th>
                  <th>Ação</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </template>
  </app-layout>
</template>
 
<script>
import AppLayout from "@/Layouts/AppLayout";
import BotaoAdicionarProjeto from "@/Pages/components/BotaoAdicionarProjeto";

var moment = require("moment");

export default {
  components: {
    AppLayout,
    BotaoAdicionarProjeto,
  },

  props: {
    dados: Array,
  },
  data() {
    return {
      index: null,
      data: this.dados,
    };
  },
  methods: {
    formatarDataIncio(index) {
      let data_formatada = this.data[index].data_inicio;
      return moment(data_formatada).format("L");
    },
    formatarDataFim(index) {
      let data_formatada = this.data[index].data_fim;
      return moment(data_formatada).format("L");
    },
  },
};

$(document).ready(function () {
  $("#listagem").DataTable({
    scrollY: true,
    scrollX: true,

    language: {
      lengthMenu: "Exibindo _MENU_ por página",
      zeroRecords: "Nada encontrado",
      info: "Mostrando pág _PAGE_ de _PAGES_",
      infoEmpty: "Nenhum Projeto Encontrado -",
      infoFiltered: "(Buscado em _MAX_ resultados)",
      search: "Buscar",
      paginate: {
        previous: "Anterior",
        next: "Próximo",
      },
    },
  });
});
</script>
<style  scoped>
.ajustePadding {
  padding: 1rem;
}

.btn-acao {
  width: 3.7rem;
  text-align: center;
  padding: 0.4rem 0.4rem;
  border: 0.1rem solid white;
  color: white;
  border-radius: 0.5rem;
  font-size: 0.8rem;
  transition-duration: 0.8s;
  outline: none;
}

.btn-acao:hover {
  background-color: white;
  border-color: black;
  color: black;
}

.excluir {
  background-color: rgb(199, 31, 53);
}
.editar {
  background-color: rgb(31, 136, 136);
}
.sInvestimento {
  background-color: rgb(1, 143, 13);
  width: 8.5rem;
}
</style>
