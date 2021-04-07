<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
        <BotaoAdicionarProjeto />
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-sm ajustePadding">
          
          <table id="listagem" class="stripe" style="width:100%">
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
            <tr>
                <td>Apollo</td>
                <td>21/04/2021</td>
                <td>21/04/2025</td>
                <td>61.000,00</td>
                <td>20%</td>
                <td>Editar / Excluir</td>
            </tr>
             <tr>
                <td>Apollo 2</td>
                <td>21/04/2021</td>
                <td>21/04/2025</td>
                <td>5.000,00</td>
                <td>5%</td>
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
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import BotaoAdicionarProjeto from "@/Pages/components/BotaoAdicionarProjeto";

export default {
  components: {
    AppLayout,
    BotaoAdicionarProjeto,
  },
};




$(document).ready(function() {
    $('#listagem').DataTable( {
        "scrollY": true,
        "scrollX": true,
        
        "language": {
            "lengthMenu": "Exibindo _MENU_ por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando pág _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum Projeto Encontrado -",
            "infoFiltered": "(Buscado em _MAX_ resultados)",
            "search": "Buscar",
            "paginate": {
                 "previous": "Anterior",
                 "next": "Próximo"
            }
        }
    } );
} );
</script>
<style  scoped>
.ajustePadding{
  padding: 1rem;
}
     
</style>
