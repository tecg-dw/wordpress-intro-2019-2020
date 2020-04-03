const mix = require('laravel-mix');

mix .sass('source/sass/style.scss', 'assets/css')
    .js('source/js/script.js', 'assets/js')
    .copy('source/fonts', 'assets/fonts')
    .copy('source/img', 'assets/img');