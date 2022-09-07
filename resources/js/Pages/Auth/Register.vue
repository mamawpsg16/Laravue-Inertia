<script setup>
/** IMPORTS */
import { useForm, Head } from '@inertiajs/inertia-vue3'
import GuestVue from '../../Layouts/Guest.vue';
import FormInput from '../../Components/FormInput.vue';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})
const register = function () {
    form.post(route('auth.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: (error) => null
    })
}
</script>
<template >

    <Head title="Register" />
    <GuestVue>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
        </header>
        <form @submit.prevent="register">
            <FormInput :error="form.errors.name" label="Full Name" id="name" placeholder="Enter your name" type="text"
                v-model="form.name"></FormInput>

            <FormInput :error="form.errors.email" label="Email" id="email" placeholder="Enter your email" type="email"
                v-model="form.email"></FormInput>

            <FormInput :error="form.errors.password" label="Password" id="password" placeholder="Enter your password"
                type="password" v-model="form.password"></FormInput>

            <FormInput :error="form.errors.password_confirmation" id="password_confirmation"
                label="Password Confirmation" placeholder="Enter your password confirmation" type="password"
                v-model="form.password_confirmation">
            </FormInput>

            <div class="mb-6">
                <button :disabled="form.processing" class="text-white bg-gray-500 rounded py-2 px-4 hover:bg-gray-700"
                    type="submit">
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p class="text-black">
                    Already have an account?
                    <a :href="route('auth.login')" class="text-blue-500 hover:underline">Login</a>
                </p>
            </div>
        </form>
    </GuestVue>
</template>

