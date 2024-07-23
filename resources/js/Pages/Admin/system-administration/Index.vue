<template>

    <Head title="System Administration" />

    <AuthenticatedLayout>
        <template #header>System Administration</template>
        <template #link>
            <Link :href="route('admin.create')"
                class="flex items-center justify-center gap-2 px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700">
            <span>New User</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            </Link>
        </template>
        <div class="p-4 bg-white shadow-xs rounded-lh">
            <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <Table>
                        <template #header>
                            <TableRow
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <TableHeaderCell>ID</TableHeaderCell>
                                <TableHeaderCell>Name</TableHeaderCell>
                                <TableHeaderCell>Email</TableHeaderCell>
                                <TableHeaderCell>Action</TableHeaderCell>
                            </TableRow>
                        </template>
                        <template #default>
                            <TableRow v-for="user in users" :key="user.id" class="text-gray-700">
                                <TableDataCell> {{ user.id }}</TableDataCell>
                                <TableDataCell> {{ user.name }}</TableDataCell>
                                <TableDataCell> {{ user.email }}</TableDataCell>
                                <TableDataCell> Edit/Delete</TableDataCell>
                            </TableRow>
                        </template>
                    </Table>
                </div>
                <!-- <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
                    <pagination :links="users.links" />
                </div> -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import Pagination from '@/Components/Pagination.vue';
import Table from "@/Components/Table.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableRow from "@/Components/TableRow.vue";

defineProps({
    users: Object
});

</script>
