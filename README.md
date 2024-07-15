<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 1. Install Vue3 ( Vite plugin )
## Vite plugin for Vue
```
npm install --save-dev @vitejs/plugin-vue
```
## Change vite.config.js
```
import { defineConfig } from 'vite';\
import laravel from 'laravel-vite-plugin';

import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

    ],

    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },

});
```
## Install Vue and support SFCs ( Single File Components )
```
npm install --save vue@latest npm install -save-dev @vue/compiler-sfc
```

# 2. Install Inertia
## Backend ( Laravel plugin )
```
composer require inertiajs/inertia-laravel
```
### Delete welcome.blade.php and create app.blade.php with next code
```
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
  </head>

  <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @inertia

    @vite('resources/js/app.js')
  </body>

</html>
```
```
php artisan inertia:middleware
```
### Add inertia middleware to bootstrap/app.php file.
```
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        App\Http\Middleware\HandleInertiaRequests::class,
    ]);
})
```
### Create Drawer Pages in resource/js/ and in this folder create Home.vue component
```
<script setup>
import { ref } from 'vue'

const counter = ref(0)
</script>

<template>
  <button
    type="button"
    @click="counter++"
    class="p-2 text-white bg-gray-500 rounded"
  >
    Counter is: {{ counter }}
  </button>
</template>
```
### Now change routes/web.php Big Letter in Home is important Case sensitive *.vue file
```
<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(1) for progress bar test
    return Inertia::render('Home');
});
```
## Frontend ( Vue3 plugin )
```
npm install @inertiajs/vue3
```
## Change resources/js/app.js file - Init Vue and Inertia with enabled inertia progress bar
```
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
    // Webpack
    // resolve: name => require(`./Pages/${name}`),
    // Vite
    resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
    },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },

  // progress: false, disable progress bar
    progress: {
        delay: 250,
        color: '#826',
        includeCSS: true,
        showSpinner: treu,
    },

})
```

# 3. Install Tailwind CSS
```
npm install --save-dev tailwindcss postcss autoprefixer
```
```
npx tailwindcss init -p
```
tailwincss.config.js
```
/** @type {import('tailwindcss').Config} */
export default {

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  theme: {
    extend: {},
  },
  plugins: [],
}
```
## resources/css/app.css
```
@tailwind base;
@tailwind components;
@tailwind utilities;
```


