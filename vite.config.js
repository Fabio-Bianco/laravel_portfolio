import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Global SCSS (includes guest, admin, accessibility)
                'resources/sass/app.scss',
                'resources/js/app.js',
                
                // Guest Area JS
                'resources/js/guest/app.js',
                'resources/js/guest/navigation.js',
                'resources/js/guest/bio-sidebar.js',
                'resources/js/guest/contact-form.js',
                'resources/js/guest/contact-validation.js',
                'resources/js/guest/accessibility.js',
                'resources/js/guest/footer-enhanced.js',
                'resources/js/guest/theme-switcher.js',
                
                // Admin Area JS
                'resources/js/admin/projects-bulk.js',
                
                // Future Features (disabled)
                // 'future/splash.css',
                // 'future/splash.js',
            ],
            refresh: true,
        }),
    ],
});
