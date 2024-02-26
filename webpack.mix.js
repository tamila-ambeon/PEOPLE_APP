const mix = require('laravel-mix');

mix.combine([
    'public/css/*.css',
], 'public/people-style-bundle.css');

