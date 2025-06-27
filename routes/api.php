<?php

use App\Http\Controllers\Api\AllergenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CuisineController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DietryRestrictionsController;
use App\Http\Controllers\Api\UserController;



// user
Route::get('user/index', [UserController::class, 'index']);
Route::get('user/show/{id}', [UserController::class, 'show']);
Route::post('user/store', [UserController::class, 'store']);
Route::post('user/update/{id}', [UserController::class, 'update']);
Route::delete('user/delete/{id}', [UserController::class, 'destroy']);





// cuisine
Route::get('cuisine/index', [CuisineController::class, 'index']);
Route::get('cuisine/create', [CuisineController::class, 'create']);
Route::post('cuisine/store', [CuisineController::class, 'store']);
Route::get('cuisine/edit/{id}', [CuisineController::class, 'edit']);
Route::post('cuisine/update/{id}', [CuisineController::class, 'update']);
Route::delete('cuisine/delete/{id}', [CuisineController::class, 'destroy']);


// Product
Route::get('products/create', [ProductController::class, 'create']);
Route::get('prdoucts', [ProductController::class, 'index']);
Route::post('products/store', [ProductController::class, 'store']);
Route::get('products/edit/{product_id}', [ProductController::class, 'edit']);
Route::post('products/update/{product_id}', [ProductController::class, 'update']);
Route::delete('products/delete/{product_id}', [ProductController::class, 'destroy']);




// allergen
Route::get('allergens', [AllergenController::class, 'index']);
Route::post('allergens/store', [AllergenController::class, 'store']);
Route::post('allergens/update/{allergen_id}', [AllergenController::class, 'update']);
Route::delete('allergens/delete/{allergen_id}', [AllergenController::class, 'destroy']);


// dietry restrictions
Route::get('dietry/index', [DietryRestrictionsController::class, 'index']);
Route::post('dietry/store', [DietryRestrictionsController::class, 'store']);
Route::post('dietry/update/{dietry_id}', [DietryRestrictionsController::class, 'update']);
Route::delete('dietry/delete/{dietry_id}', [DietryRestrictionsController::class, 'destroy']);

