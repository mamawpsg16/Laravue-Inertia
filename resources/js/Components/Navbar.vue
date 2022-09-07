<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'
const getFirstName = computed(() => usePage().props.value.user)
</script>
<template>
    <section id="navbar-section">
        <nav id="navbar">
            <div id="nav-logo">
                <Link :href="route('home')" class="nav-link">LOGO</Link>
            </div>
            <div class="nav-item" v-if="!$page.props.auth.name">
                <Link :href="route('auth.login')" class="nav-link">
                Login
                </Link>
                <Link :href="route('auth.create')" class="nav-link">
                Register
                </Link>
            </div>
            <div class="nav-item items-center" v-else>
                <label id="username">{{ $page.props.auth.name }}</label>
                <Link :href="route('about')" class="nav-link">AboutUs</Link>
                <Link :href="route('auth.logout')" class="nav-link" method="post" as="button">
                Logout
                </Link>
            </div>
        </nav>
    </section>
</template>