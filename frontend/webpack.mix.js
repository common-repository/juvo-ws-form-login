let mix = require('laravel-mix');
require('laravel-mix-purgecss');
require('laravel-mix-merge-manifest');

mix.js('frontend/js/wsform-login-public.js', 'js')
   .sass('frontend/scss/wsform-login-public.scss', 'css')
   .purgeCss({
      content: ['frontend/views/**/*.twig'],
      css: ['frontend/dist/**/*.css']
  })
  .setPublicPath('frontend/dist')
  .setResourceRoot('../')
  .mergeManifest();
