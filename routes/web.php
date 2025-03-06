<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('contacto', function () {
    return view('contacto');
});

Route::get('sobre-nosotros', function () {
    return view('sobre-nosotros');
});

Route::get('funcionalidades', function () {
    return view('funcionalidades');
});
