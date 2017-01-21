
const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
}

var paths_admin = {
    'adminlte': './vendor/bower_components/AdminLTE/'
}

elixir(function(mix) {
    mix.sass("app.scss", 'public/css/', null, {includePaths: [paths.bootstrap + 'stylesheets/']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js"
        ], 'public/js/app.js');

    // Copy flag resources
    mix.copy('./vendor/bower_components/flag-sprites/dist/css/flag-sprites.min.css', 'public/css/flags.css');
    mix.copy('./vendor/bower_components/flag-sprites/dist/img/flags.png', 'public/img/flags.png');

     // Merge Admin CSSs.
    mix.styles([
        paths_admin.adminlte + 'bootstrap/css/bootstrap.min.css',
        paths_admin.adminlte + 'dist/css/skins/skin-blue.min.css',
        paths_admin.adminlte + 'dist/css/AdminLTE.min.css'
    ], 'public/css/admin.css');

    mix.copy('./vendor/bower_components/AdminLTE/dist/img/**', 'public/img');

    mix.scripts([
    	paths.jquery + "dist/jquery.js",
        paths_admin.adminlte + 'bootstrap/js/bootstrap.min.js',
        paths_admin.adminlte + 'dist/js/app.min.js'
    ], 'public/js/admin.js');
});