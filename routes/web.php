<?php

use Illuminate\Support\Facades\Route;

Route::get('inicio', function () {
    return view('inicio');
});
Route::get('inicio2', function () {
    return view('inicio2');
});