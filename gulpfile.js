var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'angular': './vendor/bower_components/angular/',
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/',
    'jquery': './vendor/bower_components/jquery/',
    'fontawesome': './vendor/bower_components/font-awesome/'
};

elixir(function (mix) {
    mix.sass("app.scss", 'public/css/app-temp.css', {includePaths: [paths.bootstrap + 'stylesheets', paths.fontawesome + 'scss']});

    mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
        .copy(paths.fontawesome + 'fonts/**', 'public/fonts/fontawesome');
    mix.styles([
        'resources/assets/css/custom/style.css',
        'resources/assets/css/custom/navbar.css',
        'public/css/app-temp.css'
    ], 'public/css/app.css', './');

    mix.scripts([
        paths.angular + 'angular.js',
        paths.bootstrap + 'javascripts/bootstrap.js',
        paths.jquery + 'dist/jquery.js',
        'resources/assets/js/custom/date.js',
        'resources/assets/js/custom/wired.js'

    ], 'public/js/vendor.js');

});
