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
                            />
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
                product: null
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