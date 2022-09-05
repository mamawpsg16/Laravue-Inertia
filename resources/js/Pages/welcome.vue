<template lang="">
    <div>
        <Head title="HOME" />
        <p>HOME</p>
        <Link :href="route('about')">ABOUT</Link>
    </div>
</template>
<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3'
</script>
<style lang="">
    
</style>