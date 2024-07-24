<template>
  <input
      class="mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:text-gray-300 dark:bg-gray-700 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
      :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input"/>
</template>

<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>
