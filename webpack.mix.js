const mix = require('laravel-mix');

// Compilando JavaScript e CSS com Tailwind
mix.js('resources/js/app.js', 'public/js') // Compila o arquivo JS
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'), // Processa o Tailwind no CSS
   ]);
