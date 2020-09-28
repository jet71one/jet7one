let mix = require('laravel-mix');

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

mix.setPublicPath('../../../../public/themes/uikit/')
	.sass('assets/sass/app.sass', 'css')
	.js('assets/js/app.js', 'js')
	.browserSync('wave.loc');