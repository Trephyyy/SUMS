<template>
    <div>
        <h1 class="text-2xl font-bold text-center">Edit Unit</h1>
        <form @submit.prevent="SendForm()" class="flex flex-col items-center">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" v-model="formData.name">
            </div>
            <div class="input-group">
                <label for="quantity">Quantity</label>
                <input type="number" v-model="formData.quantity">
            </div>
            <div class="input-group">
                <label for="price">Price</label>
                <input type="text" v-model="formData.price">
            </div>
            <div class="input-group">
                <label for="sku">SKU</label>
                <input type="text" v-model="formData.SKU">
            </div>
            <button type="submit" class="px-6 py-2 bg-blue-500">Submit</button>
        </form>
    </div>
</template>
<script setup>
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const {unit} = defineProps(['unit'])

    const formData = reactive({ name: unit.name, price: unit.price, quantity: unit.quantity, SKU: unit.SKU })

    function SendForm() {
        console.log(formData)
        router.put('/units/' + unit.id, formData)
    }
</script>
<style scoped>
    .input-group{
        display: flex;
        flex-direction: column;
    
    }
    .input-group > input{
        min-width: 350px;
        max-width: 20vw;

    }
</style>