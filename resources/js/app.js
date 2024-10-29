import './bootstrap';
import '../css/app.css';
import '../css/datatable-custom.css';
import NProgress from 'nprogress';
import '../css/nprogress-custom.css';

import $ from 'jquery';
window.$ = window.jQuery = $;

// Import DataTables libraries
// import 'datatables.net-dt/css/dataTables.dataTables.css';
import 'datatables.net';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { Inertia } from '@inertiajs/inertia';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Configure NProgress
NProgress.configure({ showSpinner: false });

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        // Start NProgress on Inertia start
        Inertia.on('start', () => {
            NProgress.start();
        });

        // Stop NProgress on Inertia finish
        Inertia.on('finish', (event) => {
            NProgress.done(); // Ensure it finishes even on errors
        });

        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#9333EA',
    },
});

