<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import UnitTable from '@/Components/Dashboard/UnitTable.vue'
import CreateUnitForm from '@/Components/Dashboard/CreateUnitForm.vue'
import EditUnitForm from '@/Components/Dashboard/EditUnitForm.vue'

import Modal from '@/Components/Modal.vue';
import { router, Link } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';
import UnitEdit from './Units/UnitEdit.vue';
const { units } = defineProps(['units'])


function deleteUnit(id){
    console.log(id)
    router.delete('units/' + id)
}

const showCreateModal = ref(false)
function createUnit(formData) {
    router.post('units', formData)
    showCreateModal.value = false    
}

const showEditModal = ref(false)
const editData = reactive({})

function toggleEdit(unit){
    editData.value = unit
    showEditModal.value = true
}

function editUnit(unit){
    router.put('units/'+ unit.id, unit)
    showEditModal.value = false
}

function increaseUnit(unit){
    console.log("inc")
    unit.quantity = unit.quantity + 1
    router.put('units/'+ unit.id, unit)
}
function decreaseUnit(unit){
    unit.quantity = unit.quantity - 1

    router.put('units/'+ unit.id, unit)
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-row items-center w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Dashboard
            </h2>
            <button class="px-8 py-2 ml-auto text-white bg-blue-600" @click="showCreateModal = true">Create Unit</button>
        </div>
        </template>
        <!-- Create Modal -->
        <div>
            <Modal @close="showCreateModal = false"  :show="showCreateModal">
                <CreateUnitForm @submitForm="createUnit" />
            </Modal>
        </div>
        <div>
            <Modal @close="showEditModal = false"  :show="showEditModal">
                <EditUnitForm :unit="editData.value" @submitForm="editUnit" />
            </Modal>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 ">
                   <UnitTable @delete="deleteUnit" @increaseUnit="increaseUnit" @decreaseUnit="decreaseUnit" @edit="toggleEdit" :units="units"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<style scoped>

</style>