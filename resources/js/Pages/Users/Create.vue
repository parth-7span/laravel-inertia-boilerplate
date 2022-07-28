<template>

    <Head title="Users"></Head>
    <div class="m-4 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                    <p v-if="editUser" class="mt-2 text-sm text-gray-700">Edit a <strong>{{ editUser?.name }}</strong>
                    </p>
                    <p v-if="!editUser" class="mt-2 text-sm text-gray-700">Create a new user
                    </p>
                </div>
            </div>
        </div>

        <form @submit.prevent="submit">
            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
                <div class="w-full">
                    <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Name
                    </label>
                    <div class="mt-1">
                        <div class="flex ">
                            <input type="text" v-model="form.name" class="border rounded border-gray-500 p-2 w-full" />
                        </div>
                        <div v-if="errors.name" v-text="errors.name" class="error text-sm font-medium text-red-700">
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
                <div class="w-full">
                    <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Email
                    </label>
                    <div class="mt-1">
                        <div class="flex ">
                            <input type="email" v-model="form.email"
                                class="border rounded border-gray-500 p-2 w-full" />
                        </div>
                        <div v-if="errors.email" v-text="errors.email" class="error text-sm font-medium text-red-700">
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
                <div class="w-full">
                    <div class="mt-1">
                        <button :disabled="form.precessing"
                            class="bg-indigo-500 text-white rounded py-2 px-4 hover:bg-indigo-600">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>

</template>

<script setup>
import LayoutVue from '../Layouts/Layout.vue'
import { Head } from '@inertiajs/inertia-vue3'
import { useForm } from '@inertiajs/inertia-vue3';

let props = defineProps({
    errors: Object,
    editUser: Object
})

let form = useForm({
    name: props.editUser?.name,
    email: props.editUser?.email,
})

let submit = () => {
    form.post(`/users/${props.editUser?.uuid}/edit`);
}

</script>

<script>
export default {
    layout: LayoutVue,
    components: { Head },
}
</script>
