<template>
  <table class="w-full table-auto dark:text-white">
    <thead>
      <tr>
        <th>SKU</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price (£)</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody v-if="editMode == false">
      <tr v-for="unit in units" class='main-row ' :key="unit.id">
        <td>{{ unit.SKU }}</td>
        <td>{{ unit.name }}</td>
        <td class="w-[5vw] text-center">{{ unit.quantity }}</td>
        <td class="w-[5vw] text-center">{{ unit.price }}</td>
        <td class="space-y-2 text-center sm:space-x-4">
          <button class="px-2 py-1 border-[1px] dark:border-2 border-gray-800 dark:border-gray-500  sm:px-4 sm:py-2 rounded-xl" @click="$emit('increaseUnit', unit)">+</button>
          <button class="px-2 py-1 dark:border-2 dark:border-gray-500 border-[1px] border-gray-800  sm:px-4 sm:py-2 rounded-xl" @click="$emit('decreaseUnit', unit)">-</button>
        </td>
        <td class="space-y-2 text-center sm:space-x-4">
          <button class="px-4 py-1 bg-blue-500 dark:bg-blue-600 sm:py-2 sm:px-6 rounded-xl" @click="$emit('edit', unit)">Edit</button>
          <button class="px-2 py-1 bg-red-400 dark:bg-red-600 sm:py-2 sm:px-6 rounded-xl" @click="$emit('delete', unit.id)">Delete</button>
        </td>
        
      </tr>
    </tbody>

   
  </table>
</template>
<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const { units } = defineProps(['units'])
const emits = defineEmits(['edit', 'delete'])

const editMode = ref(false)

</script>
<style scoped>
@media (prefers-color-scheme: dark) {
th {
  
  border: 2px solid #4b5563;
}

.main-row {
  border: 2px solid #4b5563;

}

.main-row>td:not(:last-child) {
  padding: 20px 10px;
  border: 2px solid #4b5563;
}
}
@media(prefers-color-scheme: light){
  .main-row>td:not(:last-child) {
  padding: 20px 10px;
  border: 1px solid #2c2c2c ;

  }
  .main-row {
    border: 1px solid #2c2c2c ;

}
th {
  
  border: 1px solid #2c2c2c ;
}
}

.main-row>td:last-child {
  padding: 20px 10px;
  
}
@media (max-width: 640px) {
    thead, td{
      font-size: 0.8em;
    }

}
</style>