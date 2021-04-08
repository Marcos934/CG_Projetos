<template>
  <app-layout>
    <template #header>
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
                  <td>{{ formatarDataIncio(index)}}</td>
                  <td>{{ formatarDataFim(index) }}</td>
                  <td>{{ dados[index].valor }}</td>
                  <td>{{ dados[index].valor }}</td>
                  <td>Editar / Excluir</td>
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
var moment = require('moment');

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
      data: this.dados
    };
  },
  methods:{
    formatarDataIncio(index){
      let data_formatada =  this.data[index].data_inicio;
      return moment(data_formatada).format("L"); 
    },
    formatarDataFim(index){
      let data_formatada =  this.data[index].data_fim;
      return moment(data_formatada).format("L"); 
    }

  }
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
</style>
