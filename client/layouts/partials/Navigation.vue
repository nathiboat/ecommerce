<template>
  <nav
    class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800"
  >
    <div class="container flex flex-wrap justify-between items-center mx-auto">
      <NuxtLink :to="{ name: 'index'}" class="flex"> Cart </NuxtLink>
      <button
        data-collapse-toggle="mobile-menu"
        type="button"
        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg  md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="mobile-menu-2"
        aria-expanded="false"
      >
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" >
          <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li v-for="category in categories" :key="category.slug"  class="relative group">
                  <NuxtLink :to="{ name: 'categories-slug', params: {slug: category.slug } }" :key="category.slug"  class="flex flex-row items-center w-full px-4 py-4 mt-2 text-base font-bold text-left uppercase bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 focus:outline-none font-montserrat" aria-current="page">
                    {{ category.name }}
                  
                  </NuxtLink>
                  <template v-if="category.children.length">
                 
                   
                    <div class="absolute z-10 hidden bg-grey-200 group-hover:block">
                      <div class="px-2 pt-2 pb-4 bg-white bg-gray-200 shadow-lg">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2" v-for="child in category.children" :key="child.slug">
                          <NuxtLink :to="{ name: 'categories-slug', params: {slug: child.slug } }" :key="category.slug"  class="flex flex-row items-center w-full px-4 py-4 mt-2 text-base font-bold text-left uppercase bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 focus:outline-none font-montserrat" aria-current="page">{{ child.name }}</NuxtLink>
                        </div>
                      </div>
                    </div>
                  </template>  
                </li>
            </ul>
        </div>
    </div>
  </nav>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default { 
    computed: {
      ...mapGetters([
        'categories'
      ])
    }  
  }
</script>
