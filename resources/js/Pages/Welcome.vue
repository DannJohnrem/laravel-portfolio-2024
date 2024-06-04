<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Footer from "@/Components/Footer.vue";
import Navbar from "@/Components/Navbar.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    auth: Object,
});
</script>

<template>

    <Head title="DannPortfolio" />
    <Navbar :canLogin="canLogin" :canRegister="canRegister"></Navbar>

    <section class="bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
                <div class="relative h-64 overflow-hidden rounded-lg sm:h-80 lg:order-last lg:h-full">
                    <img alt=""
                        src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                        class="absolute inset-0 object-cover w-full h-full" />
                </div>

                <div class="lg:py-24">
                    <h2 class="text-3xl font-bold sm:text-4xl dark:text-white">Hi, I'm Dann Johnrem</h2>

                    <p class="mt-4 text-gray-600 dark:text-gray-300">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut qui hic atque tenetur quis
                        eius quos ea neque sunt, accusantium soluta minus veniam tempora deserunt? Molestiae eius
                        quidem quam repellat.
                    </p>

                    <a href="#"
                        class="inline-block px-12 py-3 mt-8 text-sm font-medium text-white transition bg-indigo-600 rounded hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-yellow-400">
                        Get Started Today
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="overflow-hidden bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white sm:grid sm:grid-cols-2">
        <div class="p-8 md:p-12 lg:px-16 lg:py-24">
            <div class="max-w-xl mx-auto text-center ltr:sm:text-left rtl:sm:text-right">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white md:text-3xl">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit
                </h2>

                <p class="hidden text-gray-500 md:mt-4 md:block">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas tempus tellus etiam
                    sed. Quam a scelerisque amet ullamcorper eu enim et fermentum, augue. Aliquet amet volutpat
                    quisque ut interdum tincidunt duis.
                </p>

                <div class="mt-4 md:mt-8">
                    <a href="#"
                        class="inline-block px-12 py-3 text-sm font-medium text-white transition bg-gray-800 rounded hover:bg-gray-700 focus:outline-none focus:ring focus:ring-yellow-400">
                        Get Started Today
                    </a>
                </div>
            </div>
        </div>

        <img alt=""
            src="https://images.unsplash.com/photo-1464582883107-8adf2dca8a9f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
            class="object-cover w-full h-56 sm:h-full" />
    </section> -->
    <!-- <section
        class="relative bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="relative max-w-screen-xl px-4 py-32 mx-auto lg:flex lg:h-screen lg:items-start">
            <div class="max-w-xl mx-auto text-center dark:text-white lg:z-10">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Understand User Flow.
                    <strong class="font-extrabold text-red-700 sm:block">
                        Increase Conversion.
                    </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Nesciunt illo tenetur fuga ducimus numquam ea!
                </p>

                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <a class="block w-full px-12 py-3 text-sm font-medium text-white bg-red-600 rounded shadow hover:bg-red-700 focus:outline-none focus:ring active:bg-red-500 sm:w-auto"
                        href="#">
                        Get Started
                    </a>

                    <a class="block w-full px-12 py-3 text-sm font-medium text-red-600 rounded shadow hover:text-red-700 focus:outline-none focus:ring active:text-red-500 sm:w-auto"
                        href="#">
                        Learn More
                    </a>
                </div>
            </div>
            <img alt=""
                src="https://images.unsplash.com/photo-1464582883107-8adf2dca8a9f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                class="absolute top-0 right-0 object-cover w-full h-full lg:w-1/2 lg:h-full" />
        </div>
    </section> -->
    <div
        class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    </div>
    <Footer></Footer>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
