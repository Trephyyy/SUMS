<template>
    <div class="w-[180px] my-4 relative flex flex-row items-center justify-around h-[40px] rounded-xl bg-white dark:bg-slate-600">
        <Link class="dark:text-white" href="/login" v-if="$page.url != '/login'">Log In</Link>
        <p  class="text-gray-500" v-if="$page.url == '/login'">Log In</p>

        <Link class="dark:text-white" href="/register" v-if="$page.url != '/register'">Register</Link>
        <p class="text-gray-500" v-if="$page.url == '/register'">Register</p>

    </div>
</template>
<script setup>
    import { Link, router } from '@inertiajs/vue3'
</script>