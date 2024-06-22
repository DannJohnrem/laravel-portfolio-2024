<template>
    <header class="z-10 py-4 bg-white shadow-md">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 md:justify-end">
            <!-- Mobile hamburger -->
            <button @click="$page.props.showingMobileMenu = !$page.props.showingMobileMenu"
                class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                aria-label="Menu">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <Dropdown>
                <!-- notification section -->
                <template #notif>
                    <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                        aria-label="Notifications" aria-haspopup="true">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                            </path>
                        </svg>
                        <!-- Notification badge -->
                        <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                    </button>
                </template>
                <template #content-notif>
                    <DropdownLink>
                        <template #icon>
                            <span class="grow">Messages</span>
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                13
                            </span>
                        </template>
                    </DropdownLink>
                    <DropdownLink>
                        <template #icon>
                            <span class="grow">Sales</span>
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                13
                            </span>
                        </template>
                    </DropdownLink>
                    <DropdownLink>
                        <template #icon>
                            <span class="grow">Alerts</span>
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                13
                            </span>
                        </template>
                    </DropdownLink>
                </template>
                <!-- account section-->
                <template #trigger>
                    <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                        aria-label="Account" aria-haspopup="true">
                      fs
                    </button>

                </template>

                <template #content>
                    <DropdownLink :href="route('profile.edit')">
                        <template #icon>
                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Profile
                        </template>
                    </DropdownLink>

                    <DropdownLink :href="route('logout')" method="post" as="button">
                        <template #icon>
                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Log Out
                        </template>
                    </DropdownLink>
                </template>
            </Dropdown>

        </div>
    </header>
</template>

<script setup>
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
</script>
