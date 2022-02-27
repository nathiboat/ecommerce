<template>
    <div class="section">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 gap-4">
                <div class="W-1/2">
                    <img src="http://via.placeholder.com/620x620" alt="Product name">
                </div>
                <div class="W-1/2">
                    <section class="section">
                        <h1 class="mt-2">{{ product.name }} </h1>
                        <p v-if="product.description" class="mt-5"> {{ product.description }} </p>
                        <hr  class="my-10">
                        <span class="rounded bg-gray-200 p-1 mt-5">
                            {{ product.price }}
                        </span>
                    </section>

                    <section class="mt-4">
                        <form action="">
                            <ProductsProductVariation v-for="(variations, type) in product.variations"
                            :type="type"
                            :key="type"
                            :variations="variations"
                            v-model="form.variation"
                            />
                            
                            <template v-if="form.variation" >
                                <div class="custom-number-input h-10 w-32">
                               
                                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                        <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                        </button>
                                        <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
                                        <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                            <span class="m-auto text-2xl font-thin">+</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex item-center justify-between mt-3">
                                    <button
                                        class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded"
                                    >
                                        Add to Card
                                    </button>
                                </div>
                            </template>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return { 
                product: null,
                form: {
                    variation: '',
                    quantity: 1
                }
            }
        },
        async asyncData ({ params, app }) {
            let response = await app.$axios.$get(`products/${params.slug}`)

            return { 
                product: response.data
            }
        }
    }
</script>

<style>
  input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .custom-number-input input:focus {
    outline: none !important;
  }

  .custom-number-input button:focus {
    outline: none !important;
  }
</style>