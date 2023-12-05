import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import vue from "@vitejs/plugin-vue";
import { svgSpritemap } from 'vite-plugin-svg-spritemap';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        },
        watch: {
            usePolling: true
        }
    },
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
        svgSpritemap({
            pattern: 'resources/svg/*.svg',
        }),
    ],
});
