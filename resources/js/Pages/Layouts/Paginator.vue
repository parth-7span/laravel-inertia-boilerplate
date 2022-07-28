<template>
    <span class="relative z-0 inline-flex">
        <span>
            <Link :href="prevPage"
                class="border-transparent text-gray-500 inline-flex items-center px-1 text-sm font-medium">
            <span :class="{ 'text-gray-200': prevPage == null }"
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5 hover:border-gray-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            </Link>
        </span>

        <span wire:key="paginator-page-1-page1" v-for="link in links" :key="link.label">
            <Link :href="link.url"
                class="border-transparent text-gray-500 inline-flex items-center px-1 text-sm font-medium">
            <span aria-current="page">
                <span
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 select-none hover:border-gray-500"
                    :class="{ 'font-bold border-gray-900': link.active }">
                    {{ link.label }}
                </span>
            </span>
            </Link>
        </span>

        <span>
            <Link :href="nextPage"
                class="border-transparent text-gray-500 inline-flex items-center px-1 text-sm font-medium">
            <span :class="{ 'text-gray-200': nextPage == null }"
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5 hover:border-gray-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            </Link>
        </span>
    </span>
</template>

<script>
import NavLInk from './NavLInk.vue';
export default {
    components: { NavLInk },
    props: {
        links: Array,
        nextPage: String,
        prevPage: String,
    },
    computed:{
        links(){
            let links = this.links;
            links.pop();
            links.shift();
            return links;
        }
    }
}
</script>
