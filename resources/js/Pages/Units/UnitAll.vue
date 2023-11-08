<template>
    <div>
        <h1>Units:</h1>
        {{ units }}
    </div>
</template>
<script setup>
    const {units} = defineProps(["units"])
</script>