<template>

    <Head title="Update role" />

    <AuthenticatedLayout>
        <template #header>Update role</template>
        <template #link>
            <Link :href="route('roles.index')"
                class="flex items-center justify-center gap-2 px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700">
                <span>Go back</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                  </svg>

            </Link>
        </template>
        <div class="p-4 bg-white shadow-xs rounded-lh">

            <form @submit.prevent="form.put(route('roles.update', role.id))">
                <div class="mt-4">
                    <InputLabel for="name" value="Role name" />
                    <TextInput id="name" type="text" class="block w-full mt-1" v-model="form.name" required
                        autofocus autocomplete="name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="ml-4" :classP="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        Update
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";


const props = defineProps({

    role: {
        type: Object,
        required: true
    }

});

const form = useForm({

    name: props.role.name

});

</script>
