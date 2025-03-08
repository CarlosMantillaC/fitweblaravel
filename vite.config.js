import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [ //orden
                'resources/assets/css/bootstrap.min.css',
                'resources/assets/css/font-awesome.min.css',
                'resources/assets/css/flaticon.css',
                'resources/assets/css/owl.carousel.min.css',
                'resources/assets/css/barfiller.css',
                'resources/assets/css/magnific-popup.css',
                'resources/assets/css/slicknav.min.css',
                'resources/assets/css/style.css',
                'resources/assets/css/materialdesignicons.min.css',
                'resources/assets/js/jquery-3.4.1.min.js',     
                'resources/assets/js/bootstrap.min.js',
                'resources/assets/js/jquery.magnific-popup.min.js',
                'resources/assets/js/masonry.pkgd.min.js',
                'resources/assets/js/jquery.barfiller.js',
                'resources/assets/js/jquery.slicknav.js',
                'resources/assets/js/owl.carousel.min.js',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/assets/js/main.js',
            ],
            refresh: true,
        }),
    ],
});
