<template>
    <div>
        <h1>Unit:</h1>
        {{ unit }}
    </div>
</template>
<script setup>
    const { unit } = defineProps(['unit'])
</script>