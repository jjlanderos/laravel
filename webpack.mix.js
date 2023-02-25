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

mix.js('resources/js/app.js', 'public/js') //compila el archivo fuente app.js y lo guarda en public
    .sass('resources/sass/app.scss', 'public/css');////compila el archivo fuente app.scss y lo guarda en public

    //si se requiere utilizar otro lenguaje de hojas de estilo por ejemplo less o stylus
    /*
    LESS
    mix.js('resources/js/app.js', 'public/js')
    .less('resources/less/app.less', 'public/css');

    mix.js('resources/js/app.js', 'public/js')
    .stylus('resources/stylus/app.stylus', 'public/css');

    */

    //si queremos que al hacer un cambio y no tengamos que refrescar el navegador agregar:
   // mix.browserSync('http://localhost')

   //si se hace un cambio en producción y no se refleja porque toma el valor guardado en cache del equipo del usuario y solamente se reflejará si hace un limpiar cache webpack tiene una validación verficando el ambiente productivo

   if(mix.inProduction()){
        mix.version();
   }
