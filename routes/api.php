<?php

use App\Http\Controllers\Api\AllergenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CuisineController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DietryRestrictionsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReasonController;
use App\Http\Controllers\Api\ProductReportController;
use App\Http\Controllers\Api\UserDetailsController;
use App\Http\Controllers\Api\DayController;



// user
Route::get('user/index', [UserController::class, 'index']);
Route::get('user/show/{id}', [UserController::class, 'show']);
Route::post('user/store', [UserController::class, 'store']);
Route::post('user/update/{id}', [UserController::class, 'update']);
Route::delete('user/delete/{id}', [UserController::class, 'destroy']);


// user details
Route::get('userdetails/index', [UserDetailsController::class, 'index']);
Route::get('userdetails/show/{id}', [UserDetailsController::class, 'show']);
Route::post('userdetails/store', [UserDetailsController::class, 'store']);
Route::post('userdetails/update/{id}', [UserDetailsController::class, 'update']);
Route::delete('userdetails/delete/{id}', [UserDetailsController::class, 'destroy']);



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

// reasons
Route::get('reason/index', [ReasonController::class, 'index']);
Route::post('reason/store', [ReasonController::class, 'store']);
Route::get('reason/edit/{id}', [ReasonController::class, 'edit']);
Route::post('reason/update/{id}', [ReasonController::class, 'update']);
Route::delete('reason/delete/{id}', [ReasonController::class, 'destroy']);

// reports
Route::get('reports/index', [ProductReportController::class, 'index']);
Route::post('reports/store', [ProductReportController::class, 'store']);
Route::get('reports/show/{id}', [ProductReportController::class, 'show']);
Route::post('reports/update/{id}', [ProductReportController::class, 'update']);
Route::delete('reports/delete/{id}', [ProductReportController::class, 'destroy']);


// product available days
Route::get('products/availableDays/{product_id}', [ProductController::class, 'availableDays']);




// Day
Route::get('day/index', [DayController::class, 'index']);
Route::post('day/store', [DayController::class, 'store']);
Route::post('day/update/{day_id}', [DayController::class, 'update']);
Route::delete('day/delete/{day_id}', [DayController::class, 'destroy']);
