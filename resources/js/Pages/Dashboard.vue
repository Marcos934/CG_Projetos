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
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-sm">
          
          

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
</script>
