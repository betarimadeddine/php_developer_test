<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('calculator');
});

Route::get('/calculator', function () {
    return view('index');
})->name('calculator');

Route::get('/{any}', function () {
    return redirect()->route('calculator');
});