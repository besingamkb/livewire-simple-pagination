<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/opportunities');
});

Route::get('/opportunities', fn() => view('welcome'));
