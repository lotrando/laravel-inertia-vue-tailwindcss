<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(1);
    return Inertia::render('Home');
});

Route::get('counter', function () {
    sleep(1);
    return Inertia::render('Counter');
});
