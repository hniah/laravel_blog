
const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

// var paths = {
//     'jquery': './vendor/bower_components/jquery/',
//     'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
// }

var bower_path = "./vendor/bower_components";
var paths = {
  'jquery'     : bower_path + "/jquery/dist",
  'bootstrap'  : bower_path + "/bootstrap-sass/assets",
};

/*mix.sass("app.scss", "public/assets/css", {
  includePaths: [
    paths.bootstrap + '/stylesheets',
    paths.fontawesome + '/scss'
  ]
});*/

elixir(function(mix) {
    mix.sass("app.scss", 'public/css/', null, {includePaths: [paths.bootstrap + '/stylesheets']})
        .scripts([
            paths.jquery + "/jquery.js",
            paths.bootstrap + "/javascripts/bootstrap.js",
        ],'public/js/app.js');
});

