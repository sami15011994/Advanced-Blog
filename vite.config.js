import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Incluez ceci si vous utilisez Vue

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue(), // Incluez ceci si vous utilisez Vue
    ],
    build: {
        manifest: true,
    },
});
