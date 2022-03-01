<template>
    <div class="bg-gray-500 p-3 mt-5">
        <label for="">{{ type }}</label>
      
        <div>
            <div>
                <select :value="selectedVariationID" @change="change($event, type)">
                    <option value="">Please choose</option>
                    <option v-for="variation in variations" 
                            :key="variation.id"
                            :value="variation.id"
                            :disabled="!variation.in_stock"
                    >
                        {{ variation.name }}
                        <template v-if="variation.price_varies">
                            ({{ variation.price }})
                        </template>

                        <template v-if="!variation.in_stock">
                            (Out of stock)
                        </template>

                    </option>

                  
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        type: {
            required: true,
            type: String
        },
        variations: {
            trequired: true,
            type: Array
        },
        value: {
            required: false,
            default: ''
        }
    },
    
    computed: {
        selectedVariationID () {
            if(!this.findVariation(this.value.id)) {
                return ''
            }
            return this.value.id
        }
    },

    methods:{
        change (event, type) {
            this.$emit('input', this.findVariation(event.target.value))
        },
        findVariation (id) {
            let variation = this.variations.find( v => v.id == id)

            if(typeof variation === 'undefined') {
                return null
            }

            return variation
        }
    } 
}
</script>