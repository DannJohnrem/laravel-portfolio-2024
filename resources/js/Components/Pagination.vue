<template>
    <div v-if="links.length > 1" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            <Link v-for="(link, key) in links" :key="key" :href="link.url"
                class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-indigo-600 hover:text-white focus:z-20 focus:outline-offset-0"
                v-html="link.label" :class="{ 'bg-indigo-600 text-white z-10': link.active }" />
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ startItem }}</span>
                    to
                    <span class="font-medium">{{ endItem }}</span>
                    of
                    <span class="font-medium">{{ totalItems }}</span>
                    results
                </p>
            </div>
            <div>
                <nav class="inline-flex -space-x-px rounded-md shadow-sm isolate" aria-label="Pagination">
                    <Link v-for="(link, key) in links" :key="key" :href="link.url"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-indigo-600 hover:text-white focus:z-20 focus:outline-offset-0"
                        v-html="link.label" :class="{ 'bg-indigo-600 text-white z-10': link.active }" />
                </nav>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from 'vue';

const props = defineProps({
    links: {
        type: Array,
        required: true,
    },
    currentPage: {
        type: Number,
        required: true,
    },
    itemsPerPage: {
        type: Number,
        required: true,
    },
    totalItems: {
        type: Number,
        required: true,
    },
});

const startItem = computed(() => {
    if (props.currentPage && props.itemsPerPage && props.totalItems) {
        return (props.currentPage - 1) * props.itemsPerPage + 1;
    } else {
        return 0; // Handle default case gracefully
    }
});

const endItem = computed(() => {
    if (props.currentPage && props.itemsPerPage && props.totalItems) {
        return Math.min(props.currentPage * props.itemsPerPage, props.totalItems);
    } else {
        return 0; // Handle default case gracefully
    }
});

</script>
