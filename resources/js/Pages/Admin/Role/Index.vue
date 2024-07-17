<template>
    <Head title="Role page" />

    <AuthenticatedLayout>
        <template #header >Role Page</template>
        <div class="p-4 bg-white shadow-xs rounded-lh">
            <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <Table>
                        <template #header>
                            <TableRow class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <TableHeaderCell>ID</TableHeaderCell>
                                <TableHeaderCell>Name</TableHeaderCell>
                                <TableHeaderCell>Action</TableHeaderCell>
                            </TableRow>
                        </template>
                        <template #default>
                            <TableRow v-for="role in roles" :key="role.id" class="text-gray-700">
                                <TableDataCell> {{ role.id }}</TableDataCell>
                                <TableDataCell> {{ role.name }}</TableDataCell>
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
import { Head } from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableRow from "@/Components/TableRow.vue";

defineProps( {
    roles: Object
});

</script>
