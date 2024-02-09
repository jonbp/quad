const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.js('src/app.js', 'dist').setPublicPath('dist');
mix.sass('src/scss/app.scss', 'css').tailwind();

mix.disableNotifications();