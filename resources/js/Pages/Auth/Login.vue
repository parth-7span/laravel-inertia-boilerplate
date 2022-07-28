<template>
    <main class="grid place-item-center py-40">
        <section class="bg-white p-4 max-w-md mx-auto border rounded-md">
            <h1 class="text-3xl">Login</h1>
            <form @submit.prevent="submit">

                <div class="mb-6">
                    <label class="blobk mb-2 uppercase font-bold text-xs text-gray-800" for="email">
                        Email
                    </label>
                    <input type="email" v-model="form.email" class="border rounded border-gray-500 p-2 w-full" />
                    <div v-if="errors.email" v-text="errors.email" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-800" for="password">
                        Password
                    </label>
                    <input type="password" v-model="form.password" class="border rounded border-gray-500 p-2 w-full" />
                    <div v-if="errors.password" v-text="errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mt-6">
                    <button :disabled="form.precessing"
                        class="bg-indigo-500 text-white rounded py-2 px-4 hover:bg-indigo-600">
                        Login
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    props: {
        layout: null
    }
};
</script>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

defineProps({
    errors: Object
})

let form = useForm({
    email: '',
    password: ''
})

let submit = () => {
    form.post('/login');
}
</script>
