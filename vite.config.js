import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/guest-minimal.css',
                'resources/css/accessibility.css',
                'resources/js/guest-bio-sidebar.js',
                'resources/js/contact-form.js',
                'resources/js/accessibility.js',
                'resources/css/admin-sidebar.css',
                'resources/js/admin-projects-bulk.js',
            ],
            refresh: true,
        }),
    ],
});
