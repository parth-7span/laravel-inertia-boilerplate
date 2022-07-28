<template>
    <NavLInk href="/dashboard" active="$page.component == 'welcome'">
        Dashboard
    </NavLInk>
    <NavLInk href="/users" active="$page.component == 'users'">
        Users
    </NavLInk>
</template>

<script>
import NavLInk from './NavLInk.vue';
export default { components: { NavLInk } };
</script>
