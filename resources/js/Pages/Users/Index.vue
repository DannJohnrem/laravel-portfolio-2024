<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            Users
        </template>

        <div class="p-4 bg-white rounded-lg shadow-xs">
            <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
                <div class="w-full p-5 overflow-x-auto">
                    <table id="usersTable" class="w-full whitespace-no-wrap display">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import $ from 'jquery';
import 'datatables.net';

const fetchUsers = (data, callback) => {
    $.ajax({
        url: '/api/users',
        dataType: 'json',
        data: {
            length: data.length, // The number of records per page
            start: data.start, // The starting index for pagination
            search: data.search // Send the search data to the server
        },
        success: function(response) {
            callback({
                draw: data.draw, // Pass draw parameter back to DataTables
                recordsTotal: response.recordsTotal, // Total number of records before filtering
                recordsFiltered: response.recordsFiltered, // Total number of records after filtering
                data: response.data // The actual data array
            });
        },
        error: function(xhr, error, thrown) {
            console.error('Error fetching users:', error);
        }
    });
};

// Initialize DataTables on component mount
onMounted(() => {
    $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: fetchUsers,
        columns: [
            { data: 'name' },
            { data: 'email' },
        ],
        paging: true,
        searching: true,
        lengthMenu: [10, 25, 50, 100],
        language: {
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        },
    });
});
</script>

<style scoped lang="scss">
$table-border-color: #e5e7eb;
$table-background-color: #F9FAFB;
$table-primary-color: #007bff;
$table-hover-color: #0056b3;

table.dataTable {
    border-collapse: collapse;
    width: 100%;
    margin: 20px 0;

    th,
    td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid $table-border-color;
    }

    th {
        background-color: $table-background-color;
        font-weight: bold;
    }

    tr:last-child {
        border-bottom: 1px solid $table-border-color;
    }
}
</style>
