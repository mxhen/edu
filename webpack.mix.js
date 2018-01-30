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
//主页
mix.js('resources/assets/js/app.js', 'public/js');
//新闻
mix.js('resources/assets/js/news.js', 'public/js');

mix.js('resources/assets/js/course.js', 'public/js');
mix.js('resources/assets/js/page9.js', 'public/js');
mix.js('resources/assets/js/login.js', 'public/js');
mix.js('resources/assets/js/student.js', 'public/js');
mix.js('resources/assets/js/competition.js', 'public/js');
mix.js('resources/assets/js/register.js', 'public/js');
mix.js('resources/assets/js/admin.js', 'public/js');
mix.js('resources/assets/js/personal.js', 'public/js');
   //.sass('resources/assets/sass/app.scss', 'public/css');
