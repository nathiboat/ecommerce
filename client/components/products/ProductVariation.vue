<template>
    <div class="bg-gray-500 p-3">
        <label for="">{{ type }}</label>
        <div>
            <div>
                <select name="" id="">
                    <option value="">Please choose</option>
                    <option v-for="variation in variations" 
                    :key="variation.id"
                    value="">{{ variation.name }}</option>

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