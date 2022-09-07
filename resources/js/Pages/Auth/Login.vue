<script setup>
/** IMPORTS */
import { useForm, Head } from '@inertiajs/inertia-vue3'
import GuestVue from '../../Layouts/Guest.vue';
import FormInput from '../../Components/FormInput.vue';

const form = useForm({
    email: null,
    password: null,
})

</script>
<template >

    <Head title="Login" />
    <GuestVue>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
        </header>
        <form @submit.prevent="form.post(route('auth.authenticate'))">
            <FormInput :error="form.errors.email" label="Email" id="email" placeholder="Enter your email" type="email"
                v-model="form.email"></FormInput>

            <FormInput :error="form.errors.password" label="Password" id="password" placeholder="Enter your password"
                type="password" v-model="form.password"></FormInput>

            <div class="mb-6">
                <button class="text-white bg-gray-500 rounded py-2 px-4 hover:bg-gray-700" :disabled="form.processing">
                    Login
                </button>
            </div>

            <div class="mt-8">
                <p class="text-black">
                    Dont have an account?
                    <a :href="route('auth.create')" class="text-blue-500 hover:underline">Register</a>
                </p>
            </div>
        </form>
    </GuestVue>
</template>
    
    