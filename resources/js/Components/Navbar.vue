<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import { Link, usePage } from '@inertiajs/vue3';

const navigation = [
    { name: 'Home', href: '#', current: true },
    { name: 'About', href: '#', current: false },
    { name: 'Services', href: '#', current: false },
    { name: 'Portfolio', href: '#', current: false },
    { name: 'Contact', href: '#', current: false },
];

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const page = usePage();
const isAuthenticated = page.props.auth.user !== null;
</script>

<template>
    <Disclosure as="nav" class="sticky top-0 z-50 bg-gray-800" v-slot="{ open }">
        <header>
            <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="md:flex md:items-center md:gap-12">
                        <a class="block text-teal-600" href="#">
                            <span class="sr-only">Home</span>
                            <img class="w-auto h-8"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company" />
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <nav aria-label="Global">
                            <ul class="flex items-center gap-6 text-sm">
                                <li v-for="item in navigation" :key="item.name" :href="item.href">
                                    <a :class="[item.current ? 'bg-gray-900 text-white hover:bg-gray-950 cursor-pointer' : 'text-gray-300 cursor-pointer hover:bg-gray-700 hover:text-white transition', 'rounded-md px-3 py-2 text-sm font-medium']"
                                        :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="sm:flex sm:gap-4">
                            <Link :href="route('login')"
                                class="rounded-md bg-gray-900 px-5 py-2.5 text-sm font-medium text-white shadow hover:bg-gray-950">
                            Login
                            </Link>

                            <div class="hidden sm:flex">
                                <Link v-if="canRegister" :href="route('register')"
                                    class="rounded-md hover:bg-gray-700 hover:text-white px-5 py-2.5 text-sm font-medium text-gray-300">
                                Register
                                </Link>
                            </div>
                        </div>

                        <div class="block md:hidden">
                            <!-- Mobile menu button-->
                            <DisclosureButton
                                class="relative inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                <span class="absolute -inset-0.5" />
                                <span class="sr-only">Open main menu</span>
                                <Bars3Icon v-if="!open" class="block w-6 h-6" aria-hidden="true" />
                                <XMarkIcon v-else class="block w-6 h-6" aria-hidden="true" />
                            </DisclosureButton>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <DisclosurePanel class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href"
                    :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block rounded-md px-3 py-2 text-base font-medium']"
                    :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
