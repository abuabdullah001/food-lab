<?php


use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';
require __DIR__.'/Backend.php';
 require __DIR__.'/api.php';
