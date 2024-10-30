let mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.js('admin/js/wsform-login.js', 'js')
    .sass('admin/scss/wsform-login.scss', 'css')
    .setPublicPath('admin/dist')
    .setResourceRoot('../')
    .mergeManifest();
