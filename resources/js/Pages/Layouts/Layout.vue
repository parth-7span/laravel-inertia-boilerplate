<template>
    <section>
        <Header :user="user">
            <Nav></Nav>
        </Header>
        </section>

        <section class="grid px-6">
            <slot></slot>
        </section>
</template>

<script>
import Header from './Header.vue';
export default {
    components: { Header },
    props: {
        user: Object
    },
}
</script>
