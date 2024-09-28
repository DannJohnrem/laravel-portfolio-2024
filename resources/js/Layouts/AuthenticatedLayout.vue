<template>
    <div>
        <div class="flex h-screen bg-gray-50">
            <Navigation />
            <NavigationMobile />

            <div class="flex flex-col flex-1 w-full">
                <TopMenu />

                <main class="h-full overflow-y-auto dark:bg-gray-900">
                    <div class="container grid px-6 mx-auto">
                        <div class="flex justify-between">
                            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
                                <slot name="header" />
                            </h2>
                            <div class="my-auto">
                                <slot name="link"/>
                            </div>

                        </div>
                        <!-- TODO: this is a flash massage: I will decide later if I'll keep it or not -->
                        <div v-if="$page.props.flash.message" class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded alert">
                            {{ $page.props.flash.message }}
                        </div>

                        <slot />

                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import Navigation from './Navigation.vue';
import TopMenu from "./TopMenu.vue";
import NavigationMobile from './NavigationMobile.vue';
</script>
