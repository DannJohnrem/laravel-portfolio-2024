<template>
    <Head title="System Administration" />

    <AuthenticatedLayout>
        <template #header >System Administration</template>
        <div class="p-4 bg-white shadow-xs rounded-lh">Sample page for System Administration</div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>
