import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel([
            'resources/scss/app.scss',
            'resources/js/app.js',
        ]),
        autoprefixer,
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
