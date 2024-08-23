<template>

    <Head title="Create new role" />

    <AuthenticatedLayout>
        <template #header>Create new role</template>
        <template #link>
            <Link :href="route('roles.index')"
                class="flex items-center justify-center gap-2 px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700">
                <span>Go back</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                  </svg>

            </Link>
        </template>
        <div class="p-4 bg-white rounded shadow-sm dark:bg-gray-800">

            <form @submit.prevent="handleFormSubmitRoles">
                <div class="mt-4">
                    <InputLabel for="name" value="Role name" />
                    <TextInput id="name" type="text" class="block w-full mt-1" v-model="form.name" required
                        autofocus autocomplete="name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="mt-4">
                    <InputLabel for="name" value="Permission" />
                    <VueMultiselect v-model="form.permissions" :options="permissions" :multiple="true" :taggable="true"
                        placeholder="Select permission" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        Create
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
import Checkbox from "@/Components/Checkbox.vue";
import TextInput from "@/Components/TextInput.vue";
import VueMultiselect from '@/Components/MultiSelect.vue'
import Swal from "sweetalert2";

const form = useForm({
    name: '',
    permissions: [],
});

defineProps({
    permissions: Array,
});

const handleFormSubmitRoles = () => {
    form.post(route('roles.store'), {
        onSuccess: () => {
            Swal.fire({
                title: 'Success!',
                text: 'User role has been created successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        },
        onError: (errors) => {
            Swal.fire({
                title: 'Validation Error!',
                text: 'Please check the input fields.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            console.error('Validation error:', errors);
        }
    });
}

</script>

<style lang="scss">
.dark {
    .multiselect__tags {
        background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        --tw-border-opacity: 1;
        border-color: rgb(75 85 99 / var(--tw-border-opacity));

        span {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .multiselect__input {
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity));

            &::placeholder {
                --tw-text-opacity: 1;
                color: rgb(209 213 219 / var(--tw-text-opacity));
            }
        }
    }

    .multiselect__content-wrapper {
        background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        --tw-border-opacity: 1;
        border-color: light-dark(rgb(118, 118, 118), rgb(195, 195, 195));

        .multiselect__content {
            .multiselect__element {
                .multiselect__option {
                    --tw-border-opacity: 1;
                    color: rgb(209 213 219 / var(--tw-bg-opacity));

                    &.multiselect__option--selected {
                        background: light-dark(rgb(118, 118, 118), rgb(195, 195, 195));
                        color: light-dark(rgb(255, 255, 255), rgb(16, 16, 16));

                        &.multiselect__option--highlight {
                            background: #ff6a6a;
                            color: #fff;
                        }
                    }

                }
            }
        }
    }
}
</style>
