<template>
    <div class="bg-gray-500 p-3 mt-5">
        <label for="">{{ type }}</label>
        <div>
            <div>
                <select name="" id="">
                    <option value="">Please choose</option>
                    <option v-for="variation in variations" 
                    :key="variation.id"
                    :value="variation.id">
                        {{ variation.name }}
                        <template v-if="variation.price_varies">
                            ({{ variation.price }})
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
        }
    },
    setup() {
        
    },
}
</script>