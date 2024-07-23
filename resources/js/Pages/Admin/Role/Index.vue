<template>

    <Head title="Role page" />

    <AuthenticatedLayout>
        <template #header>Role Page</template>
        <template #link>
            <Link :href="route('roles.create')"
                class="flex items-center justify-center gap-2 px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700">
            <span>New Role</span>
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
                                <TableHeaderCell>Action</TableHeaderCell>
                            </TableRow>
                        </template>
                        <template #default>
                            <TableRow v-for="role in roles" :key="role.id" class="text-gray-700">
                                <TableDataCell> {{ role.id }}</TableDataCell>
                                <TableDataCell> {{ role.name }}</TableDataCell>
                                <TableDataCell class="inline-flex gap-2 align-middle">
                                    <Link :href="route('roles.edit', role.id)"
                                        class="text-green-500 hover:text-green-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    </Link>
                                    <button @click="confirmDelete(role.id)" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </TableDataCell>
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
import { Head, Link, router } from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableRow from "@/Components/TableRow.vue";
import Swal from 'sweetalert2';

defineProps({
    roles: Object
});


const confirmDelete = (roleId) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const csrfTokenMetaTag = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            if (!csrfTokenMetaTag) {
                console.error('CSRF token meta tag not found');
                Swal.fire(
                    'Error!',
                    'CSRF token not found. Please make sure it is included in the HTML.',
                    'error'
                );
                return;
            }
            fetch(route('roles.destroy', roleId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfTokenMetaTag,
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    Swal.fire(
                        'Deleted!',
                        'Your role has been deleted.',
                        'success'
                    ).then(() => {
                        // Optionally, refresh the page or update the state
                        router.reload({only: ['roles']});
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        'There was an issue deleting the role.',
                        'error'
                    );
                }
            }).catch(error => {
                Swal.fire(
                    'Error!',
                    'There was an issue deleting the role.',
                    'error'
                );
            });
        }
    });
};


</script>
