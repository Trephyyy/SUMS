<template>
    <AppLayout title="Invite">
        <template #header>
            <div class="flex flex-row items-center w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Invite
            </h2>
        </div>
        </template>
       
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                   <form @submit.prevent="sendForm()" class="p-4 dark:text-white">
                        <div class="space-y-2 form-wrapper">
                            <label for="create">Create Code</label>
                            <input class="max-w-xl dark:bg-gray-700"  v-model="formData.code" placeholder="Please use a secure code" type="text">
                        </div>
                        <button class="px-4 py-1 my-4 bg-blue-600 " type="button" @click="generatePassword">Generate</button>
                        <div class="mt-0 mb-8 space-y-2 form-wrapper "> 
                            <label for="">Expire After</label>
                            <div class="flex flex-row space-x-4">
                            <input @keypress="checkInput($event)" v-model="formData.expireAtNumber" class="w-[100px] dark:bg-gray-700" type="text">
                            <select class="max-w-sm dark:bg-gray-700" v-model="formData.expireAtTime" name="" id="">
                                <option value="m">Minutes</option>
                                <option value="h">Hours</option>
                                <option value="d">Days</option>
                            </select>
                        </div>
                        </div>
                        <div class="flex flex-row items-center space-x-4">
                            <label for="">One-Time</label>
                            <input v-model="formData.oneTime" checked type="checkbox">
                        </div>
                        <button class="px-8 py-2 my-8 font-bold text-black bg-slate-200" type="submit">Create</button>
                   </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import {  useForm } from '@inertiajs/vue3';

    function generatePassword() {
            var length = 36,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*?><:{}",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            formData.code = retVal;
        }

    const formData = useForm({
        code: '',   
        oneTime: true,
        expireAtNumber: 0,
        expireAtTime: "d"
    });
    function checkInput(e){
            if (!isNaN(e.key) && parseFloat(e.key) > 0) {
        return true;
    } else {
        e.preventDefault();
    }}

    function sendForm(){
    formData.post(route('storecode'))
    }
</script>
<style scoped>
    .form-wrapper{
        display: flex;
        flex-direction: column;
    }
</style>
