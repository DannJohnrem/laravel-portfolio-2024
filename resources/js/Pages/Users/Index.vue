<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            Users
        </template>

        <div class="p-4 bg-white rounded-lg shadow-sm">
            <div class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-center w-12 bg-blue-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-blue-500">Info</span>
                        <p class="text-sm text-gray-600">Sample table page</p>
                    </div>
                </div>
            </div>

            <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-sm">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            <tr v-for="user in users.data" :key="user.id" class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    {{ user.name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ user.email }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
                    <Pagination :links="users.links" :current-page="users.current_page" :items-per-page="itemsPerPage" :total-items="users.total"
                      @updateItemsPerPage="fetchData" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
  users: Object
});

const itemsPerPage = ref(10);

const fetchData = (newItemsPerPage) => {
  itemsPerPage.value = newItemsPerPage;
  // Make an API call or use Inertia to get the data with the new items per page
  router.get(route('users.index'), { per_page: newItemsPerPage }, { preserveState: true, preserveScroll: true });
};
</script>
