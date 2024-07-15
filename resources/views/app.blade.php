<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="image/png-icon" href="{{ asset('favicon.png') }}" rel="shortcut icon">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
  </head>

  <body class="font-sans antialiased dark:bg-blue-200 dark:text-white/80">
    @inertia

    @vite('resources/js/app.js')
  </body>

</html>
