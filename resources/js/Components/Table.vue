<template>
    <table class="w-full whitespace-no-wrap">
        <thead>
            <slot name="header"/>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-700">
            <slot/>
        </tbody>
    </table>
</template>

<script setup>

</script>
