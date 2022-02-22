<template>
  <div class="py-6">
    <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
      <nuxt-link :to="link">
          <img class="w-1/3 bg-cover" src="https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
      />
      </nuxt-link>
      <div class="w-2/3 p-4">
        <nuxt-link :to="link" class="text-gray-900 font-bold text-2xl">{{ product.name }}</nuxt-link>
        <p class="mt-2 text-gray-600 text-sm" v-if="product.description">
            {{ product.discription }}
        </p>
       
        <div class="flex item-center justify-between mt-3">
          <h1 class="text-gray-700 font-bold text-xl">{{ product.price }}</h1>
          <button
            class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded"
          >
            Add to Card
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    product: {
      required: true,
      type: Object,
    },
  },
  computed: {
    link() {
        return {
            name: 'products-slug', 
            params: { 
                slug: this.product.slug
            }
        }
    }
  }
};
</script>