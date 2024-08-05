const mix = require('laravel-mix');
const postCssImport = require('postcss-import');
const postCssNested = require('postcss-nested');
const autoprefixer = require('autoprefixer');

// Compilation des fichiers CSS pour chaque page ou section
mix.js('resources/js/app.js', 'public/js');
   mix.postCss('resources/css/app.css', 'public/css' , [
      postCssImport(),
      postCssNested(),
      autoprefixer(),
   ]); // Fichier CSS principal

mix.postCss('resources/css/pages/home.css', 'public/css/pages');
mix.postCss('resources/css/pages/create.css', 'public/css/pages');
mix.postCss('resources/css/pages/edit.css', 'public/css/pages');
mix.postCss('resources/css/pages/show.css', 'public/css/pages');
mix.postCss('resources/css/pages/categories.css', 'public/css/pages');
mix.postCss('resources/css/pages/contact.css', 'public/css/pages');
mix.postCss('resources/css/pages/email.css', 'public/css/pages');


// Ajoutez d'autres fichiers CSS pour d'autres pages ou sections si nécessaire




