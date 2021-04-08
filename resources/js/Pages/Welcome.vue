<template>
  <div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
  >
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      <inertia-link
        v-if="$page.props.user"
        href="/dashboard"
        class="text-sm text-gray-700 underline"
      >
        Dashboard
      </inertia-link>

      <template v-else>
        <inertia-link
          :href="route('login')"
          class="text-sm text-gray-700 underline"
        >
          Entrar
        </inertia-link>

        <inertia-link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 text-sm text-gray-700 underline"
        >
          Registrar
        </inertia-link>
      </template>
    </div>

    <div class="lg:px-8">
      
      <div class="text-white">
         O sistema foi desenvolvido com validação de usuário, para primeiro acesso cadastre-se:
         <inertia-link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 text-yellow-300 underline"
        >
        Registrar
        </inertia-link><br>
        Caso possua registo, faça login: 
        <inertia-link
          :href="route('login')"
          class=" text-blue-300 underline"
        >
       <button class="bt_login"> Entrar</button>
        </inertia-link>
        
        
     
      </div>
      <div
        class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
      >
        <div class="grid grid-cols-1 md:grid-cols-2"></div>
      </div>

      <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 sm:text-left">
          <div class="flex items-center">
            <a href="https://wa.me/559291461245" class="ml-1 underline">
              Contato -
            </a>

            <a
              href="https://www.linkedin.com/in/marcosmulinarii/"
              class="ml-1 underline"
            >
              Desenvolvido Por Marcos V. Mulinari </a
            ><br />
          </div>
        </div>

        <div
          class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0"
        ></div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.bg-gray-100 {
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
  border-color: #edf2f7;
  border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
  color: #cbd5e0;
  color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
  color: #a0aec0;
  color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
  color: #718096;
  color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
  color: #4a5568;
  color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
  color: #1a202c;
  color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-gray-800 {
    background-color: #2d3748;
    background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
  }

  .dark\:bg-gray-900 {
    background-color: #1a202c;
    background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
  }

  .dark\:border-gray-700 {
    border-color: #4a5568;
    border-color: rgba(74, 85, 104, var(--tw-border-opacity));
  }

  .dark\:text-white {
    color: #fff;
    color: rgba(255, 255, 255, var(--tw-text-opacity));
  }

  .dark\:text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
  }
}

.bt_login{
    
    width: 8rem;
    text-align: center;
    padding: 0.5rem 0.3rem;
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
.bt_login:hover{
    background-color:#3b4bda;
    outline: none;
}



</style>

<script>
import Register from "@/Pages/Auth/Register";
export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
  components: {
    Register
    
  },
};
</script>
