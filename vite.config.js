import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/client.css',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
});
