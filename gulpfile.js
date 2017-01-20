
const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
}

elixir(function(mix) {
    mix.sass("app.scss", 'public/css/', null, {includePaths: [paths.bootstrap + 'stylesheets/']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js"
        ], 'public/js/app.js');
});