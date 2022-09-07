<script setup>
/** IMPORTS */
import Navbar from '../Components/Navbar.vue'

</script>
<template>
    <Navbar />
    <div class="relative min-h-screen flex flex-col sm:items-center  sm:pt-10 bg-gray-100">
        <div class="w-full sm:max-w-md  px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>