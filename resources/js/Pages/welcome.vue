<template lang="">
    <div>
        <Head title="HOME" />
        <p>HOME</p>
        <Link :href="route('about')">ABOUT</Link>
    </div>
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
</script>
<style lang="">
    
</style>