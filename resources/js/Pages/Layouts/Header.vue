<template>
    <div class="flex px-4 py-4 justify-between  border-b border-b-gray-300">
        <div>
            <!-- <img :src="'@/assets/logo/logo.svg'" alt="Logo"/> -->
            <h1
                class="text-gray-400 hover:bg-gray-100 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                Inertia Demo</h1>
        </div>
        <div class="flex">
            <Nav>
                <slot></slot>
            </Nav>

            <div v-if="user">
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative">
                        <div>
                            <button type="button" v-on:click="showDP = !showDP"
                                v-bind:aria-expanded="showDP ? 'true' : 'false'" :class="{ 'active': showDP }"
                                class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <span
                                    class="p-2 bg-grey-500 border-2 rounded-full font-bold text-wine-500 bg-gray-300">{{
                                    shortName }}</span>
                            </button>

                        </div>
                        <div v-show="showDP"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            x-show="showDP" x-cloak>
                            <!-- <Link href="/logout" method="post"
                                class="block px-4 py-2 text-sm text-gray-500 font-medium hover:bg-gray-100">
                            Your Profile
                            </Link> -->
                            <Link href="/logout" method="post"
                                class="block px-4 py-2 text-sm text-gray-500 font-medium hover:bg-gray-100">
                            Log out
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="!user" class="hidden lg:flex justify-end lg:items-stretch">
                <a href="/login"
                    class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                    Sign In </a>
            </div>
        </div>
    </div>

</template>

<script>
import Nav from './Nav.vue';
export default {
    components: { Nav },
    props:{
        user: Object,
        shortName: String,
        showDP: false
    },
    data(){
        return {
            shortName: this.user.name.match(/\b(\w)/g).join('')
        }
    },
}
</script>
