<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 1. Create new laravel app version 11
```
composer create-project laravel/laravel:11 inertia-starter
```
## or clone this repository
```
git clone https://github.com/lotrando/laravel-inertia-vue-tailwindcss.git
```

# 2. Vite-plugin for Vue with Single File Components
```
npm install --save-dev @vitejs/plugin-vue
```
## Change vite.config.js
```
import { defineConfig } from 'vite';
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

# 3. Install Inertia
## Back-end side ( Laravel plugin )
```
composer require inertiajs/inertia-laravel
```
## Delete welcome.blade.php and create app.blade.php with next code
```
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/js/app.js')
    @inertiaHead
  </head>

  <body>
    @inertia

  </body>

</html>
```
## Register inertia middleware
```
php artisan inertia:middleware
```
## and add inertia middleware to bootstrap/app.php file.
```
...
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        App\Http\Middleware\HandleInertiaRequests::class,
    ]);
})
...
```
## Create Drawer Pages in resource/js/ and in this folder create Home.vue component
```
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
  <div class="h-screen flex items-center justify-center gap-2">
    <Link
      href="counter"
      type="button"
      class="p-3 text-blue-900 bg-blue-500 rounded-xl"
    >
      Counter
    </Link>
  </div>
</template>
```
## resource/js/Pages and in this folder create Counter.vue component
```
<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const counter = ref(0);
</script>

<template>
  <div class="h-screen flex items-center justify-center gap-2">
    <Link
      href="/"
      type="button"
      class="p-3 text-blue-900 bg-blue-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-home"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
      </svg>
    </Link>
    <button
      type="button"
      @click="counter--"
      class="p-3 text-green-900 bg-lime-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-left"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
          d="M20 15h-8v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h8a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1z"
        />
      </svg>
    </button>
    <span class="px-7 py-3 text-gray-700 bg-gray-200 rounded-xl">
      {{ counter }}
    </span>
    <button
      type="button"
      @click="counter++"
      class="p-3 text-green-900 bg-lime-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-right"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
          d="M4 9h8v-3.586a1 1 0 0 1 1.707 -.707l6.586 6.586a1 1 0 0 1 0 1.414l-6.586 6.586a1 1 0 0 1 -1.707 -.707v-3.586h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1z"
        />
      </svg>
    </button>
    <button
      type="button"
      @click="counter = 0"
      class="p-3 text-red-900 bg-red-500 rounded-xl"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-rotate-2"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M15 4.55a8 8 0 0 0 -6 14.9m0 -4.45v5h-5" />
        <path d="M18.37 7.16l0 .01" />
        <path d="M13 19.94l0 .01" />
        <path d="M16.84 18.37l0 .01" />
        <path d="M19.37 15.1l0 .01" />
        <path d="M19.94 11l0 .01" />
      </svg>
    </button>
  </div>
</template>
```
## Now change routes/web.php Big letter in Home and Counter components is important
```
<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(1); // Delay for progress bar test
    return Inertia::render('Home');
});

Route::get('counter', function () {
    sleep(1); // Delay for progress bar test
    return Inertia::render('Counter');
});
```
## Front-end side ( Vue3 plugin )
```
npm install @inertiajs/vue3 vue@latest
```
## Change resources/js/app.js file - Init Vue and Inertia with enabled inertia progress bar
```
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Template/Layout.vue'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component('Head', Head)
            .component('Link', Link)
            .use(plugin)
            .mount(el)
    },
    progress: {
        color: '#58f',
        showSpinner: false,
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
# Finished

## Run vite developer server
```
npm run dev
```
## or run production
```
npm run build
```

# Your Laravel-Vue App with Inertia monolith now completly installed. Now run aplication.
```
php artisan serve
```


