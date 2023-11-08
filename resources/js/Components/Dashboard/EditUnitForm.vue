<script setup>
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const {unit} = defineProps(['unit'])

    const formData = reactive({ name: unit.name, price: unit.price, quantity: unit.quantity, SKU: unit.SKU, id: unit.id })

    
</script>
<template>
    <h1 class="mt-8 text-2xl font-bold text-center dark:text-white">Edit an unit</h1>
    <form class="flex flex-col items-center py-8 space-y-4" @submit.prevent="$emit('submitForm', formData)">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" required v-model="formData.name">
        </div>
        <div class="input-group">
            <label for="quantity">Quantity</label>
            <input type="number" required v-model="formData.quantity">
        </div>
        <div class="input-group">
            <label for="price">Price</label>
            <input type="text" required v-model="formData.price">
        </div>
        <div class="input-group ">
            <label for="sku">SKU</label>
            <input type="text" required v-model="formData.SKU">
        </div>
        <button type="submit" class="px-6 py-2 text-black bg-blue-400 dark:text-white dark:bg-blue-600">Submit</button>
    </form>
</template>
<style scoped>
.input-group {
    display: flex;
    flex-direction: column;

}

.input-group>input {
    min-width: 350px;
    max-width: 20vw;

}

@media (prefers-color-scheme: dark) {
    label {
        color: white;
    }

    input {
        background: #111827;
        border: 0;
        color: white;
    }
}</style>