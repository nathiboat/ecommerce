<template>
  <div class="container mx-auto">
      <div class="grid grid-rows-3 grid-flow-col gap-4" v-for="product in products" :key="product.slug">
           <ProductsProduct :product="product"/>
      </div>
  </div>
</template>


<script>
    export default {
        data () {
            return { 
                products: []
            }
        },
        async asyncData ({ params, app }) {
            let response = await app.$axios.$get(`products?category=${params.slug}`)

            return { 
                products: response.data
            }
        }
    }
</script>