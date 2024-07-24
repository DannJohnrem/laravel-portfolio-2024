<template>
    <div>
        <ul class="flex items-center flex-shrink-0 space-x-6">
            <li class="relative">
                <slot name="toggleDark"/>
            </li>
            <li class="relative">
                <div @click="toggleNotif">
                    <slot name="notif"/>
                </div>
                <transition leave-active-class="transition duration-150 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                    <ul v-show="isNotifOpen"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                        aria-label="submenu">
                        <li>
                            <slot name="content-notif" />
                        </li>
                    </ul>
                </transition>
            </li>
            <!-- Profile menu -->
            <li class="relative">
                <div @click="toggleProfile">
                    <slot name="trigger" />
                </div>
                <transition leave-active-class="transition duration-150 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                    <ul v-show="isProfileOpen"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                        aria-label="submenu">
                        <li>
                            <slot name="content" />
                        </li>
                    </ul>
                </transition>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from 'vue'

// Separate states for each dropdown
const isProfileOpen = ref(false)
const isNotifOpen = ref(false)

// Toggle functions
const toggleNotif = () => {
    isNotifOpen.value = !isNotifOpen.value
    if (isNotifOpen.value) {
        isProfileOpen.value = false // Close profile if opening notifications
    }
}

const toggleProfile = () => {
    isProfileOpen.value = !isProfileOpen.value
    if (isProfileOpen.value) {
        isNotifOpen.value = false // Close notification if opening profile
    }
}

// Close on Escape key
const closeOnEscape = (e) => {
    if (e.keyCode === 27) {
        isProfileOpen.value = false
        isNotifOpen.value = false
    }
}

onMounted(() => document.addEventListener('keydown', closeOnEscape))
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape))
</script>
