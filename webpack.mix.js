const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('autoprefixer'),
  ]);
  mix.styles([
    'resources/css/style.css',
    'resources/css/app.css'
  ], 'public/css/all.css');
  mix.scripts([
    'resources/js/scripts.js',
  ],'public/js/all.js')
if (mix.inProduction()) {
  mix
    .version();
}

