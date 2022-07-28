<template>
    <Head title="Dashboard"></Head>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <p>Welcome, <strong>{{ user.name }}</strong></p>
    </div>
</template>

<script>
import Layout from './Layouts/Layout.vue';
import { Head } from '@inertiajs/inertia-vue3';
export default {
    layout: Layout,
    props: {
        user: Object
    },
    components: { Head }
}
</script>
