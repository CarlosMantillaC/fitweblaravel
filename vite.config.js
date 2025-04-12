import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [ //orden
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/tailwind.css',
                'resources/js/dashboard.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
