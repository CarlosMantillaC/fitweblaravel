<?php

use Illuminate\Support\Facades\Route;

Route::get('inicio', function () {
    return view('inicio');
});

Route::get('Login', function () {
    return view('Login');
});