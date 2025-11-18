import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Global
                'resources/sass/app.scss',
                'resources/js/app.js',
                
                // Guest Area
                'resources/css/guest/guest-minimal.css',
                'resources/css/guest/accessibility.css',
                'resources/js/guest/app.js',
                'resources/js/guest/bio-sidebar.js',
                'resources/js/guest/contact-form.js',
                'resources/js/guest/contact-validation.js',
                'resources/js/guest/accessibility.js',
                'resources/js/guest/footer-enhanced.js',
                
                // Admin Area
                'resources/css/admin/admin-sidebar.css',
                'resources/js/admin/projects-bulk.js',
                
                // Future Features (disabled)
                // 'future/splash.css',
                // 'future/splash.js',
            ],
            refresh: true,
        }),
    ],
});
