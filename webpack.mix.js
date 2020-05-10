const tailwindcss = require('tailwindcss')
const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css')
   .options({
       processCssUrls: false,
       postCss: [tailwindcss('./tailwind.config.js')],
   })
   .copyDirectory('resources/img', 'public/img');