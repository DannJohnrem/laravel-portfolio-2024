<template>
    <div v-if="links && links.length > 1"
        class="flex flex-col items-center justify-between space-y-4 sm:flex-row sm:space-y-0">
        <div class="flex items-center pr-1">
            <label for="itemsPerPage" class="mr-2 text-sm text-gray-700 dark:text-gray-400">Show</label>
            <select id="itemsPerPage" v-model="itemsPerPage" @change="updateItemsPerPage"
                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option v-for="option in itemsPerPageOptions" :key="option" :value="option">{{ option }}</option>
            </select>
            <span class="ml-2 text-sm text-gray-700 dark:text-gray-400">entries</span>
        </div>
        <div class="flex flex-1 sm:justify-end">
            <div class="flex justify-between flex-1 sm:hidden">
                <Link v-for="(link, key) in links" :key="key" :href="link.url"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-indigo-600 hover:text-white focus:z-20 focus:outline-offset-0"
                    v-html="link.label" :class="{ 'bg-indigo-600 text-white z-10': link.active }" />
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 dark:text-gray-400">
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
                    <nav class="inline-flex -space-x-px rounded-md shadow-sm isolate dark:border-gray-600" aria-label="Pagination">
                        <Link v-for="(link, key) in links" :key="key" :href="link.url"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 dark:text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-indigo-600 hover:text-white focus:z-20 focus:outline-offset-0"
                            v-html="link.label" :class="{ 'bg-indigo-600 text-white dark:text-white z-10': link.active }" />
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed, ref } from 'vue';

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

console.log(props.links);

const emit = defineEmits(['updateItemsPerPage']);

const itemsPerPageOptions = [10, 25, 50, 100];
const itemsPerPage = ref(props.itemsPerPage);

const startItem = computed(() => {
    return (props.currentPage - 1) * itemsPerPage.value + 1;
});

const endItem = computed(() => {
    return Math.min(props.currentPage * itemsPerPage.value, props.totalItems);
});

const updateItemsPerPage = () => {
    emit('updateItemsPerPage', itemsPerPage.value);
};
</script>
