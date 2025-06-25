<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProfileControllers;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\CuisineController;
use App\Http\Controllers\Api\DietryRestrictionsController;
use App\Http\Controllers\Api\AllergenController;
use App\Http\Controllers\Api\ProductController;




Route::middleware('admin')->group(function () {

   
//    Route::controller(DashboardController::class)->group(function(){
//     Route::get('/dashboard','index')->name('dashboard');
//    });


//    Route::controller(ProfileControllers::class)->group(function(){
//     Route::get('/profile','updateProfile')->name('profile');
//     Route::post('/profile/update','update')->name('update.profile');
//     Route::post('/profile/update/password','updatePassword')->name('profile.update.password');
//    });

   //User Manage Controller
//    Route::controller(UserController::class)->group(function(){
//     Route::get('/user/manage','index')->name('user.index');
//     Route::get('/user/get/all','allUser')->name('getUsers');
//     Route::post('/user/manage/store','store')->name('user.store');
//     Route::get('/user/manage/edit/{id}','edit')->name('user.edit');
//     Route::post('/user/manage/update/{id}','update')->name('user.update');
//     Route::get('/user/manage/delete/{id}','delete')->name('user.delete');
//    });

    // Route::controller(RoleController::class)->group(function(){
    //     Route::get('/role/manage','index')->name('role.index');
    //     Route::get('/role/get/all','allRole')->name('getRoles');
    //     Route::post('/role/manage/store','store')->name('roles.store');
    //     Route::get('/role/manage/edit/{id}','edit')->name('role.edit');
    //     Route::post('/role/manage/update','update')->name('roles.update');
    //     Route::get('/role/manage/delete/{id}','delete')->name('role.delete');
    // });

    // Route::controller(PermissionController::class)->group(function(){
    //     Route::get('/permission/manage','index')->name('permission.index');
    //     Route::get('/permission/get/all','allPermission')->name('getPermissions');
    //     Route::post('/permission/manage/store','store')->name('permission.store');
    //     Route::get('/permission/manage/edit/{id}','edit')->name('permission.edit');
    //     Route::post('/permission/manage/update','update')->name('permission.update');
    //     Route::get('/permission/manage/delete/{id}','delete')->name('permission.delete');
    //     Route::get('/permission/manage/assign','getPermission')->name('getPermission');    
    // });



    // Route::controller(DietryRestrictionsController::class)->group(function(){
    //     Route::get('/dietry/restrictions/manage','index')->name('dietry.restrictions.index');
    //     Route::get('/dietry/restrictions/get/all','allDietryRestrictions')->name('getDietryRestrictions');
    //     Route::post('/dietry/restrictions/manage/store','store')->name('restriction.store');
    //     Route::get('/dietry/restrictions/manage/edit/{id}','edit')->name('dietry.restrictions.edit');
    //     Route::post('/dietry/restrictions/manage/update','update')->name('dietry.restrictions.update');
    //     Route::get('/dietry/restrictions/manage/delete/{id}','delete')->name('dietry.restrictions.destroy');
    // });

    // Route::controller(AllergenController::class)->group(function(){
    //     Route::get('/allergen/manage','index')->name('allergen.index');
    //     Route::get('/allergen/get/all','allAllergen')->name('getAllergen');
    //     Route::post('/allergen/manage/store','store')->name('allergen.store');
    //     Route::get('/allergen/manage/edit/{id}','edit')->name('allergen.edit');
    //     Route::post('/allergen/manage/update','update')->name('allergen.update');
    //     Route::get('/allergen/manage/delete/{id}','delete')->name('allergen.delete');
    // });   
    
    
   

    Route::controller(ProductController::class)->group(function(){
        Route::get('products', 'index')->name('products.index');
        Route::get('products/create', 'create')->name('products.create');
        Route::post('products/store', 'store')->name('products.store');
        Route::get('products/edit/{product}', 'edit')->name('products.edit');
        Route::post('products/update/{product}', 'update')->name('products.update');
        Route::delete('products/delete/{product}', 'destroy')->name('products.destroy');                    
   }) ;

}) ;

 Route::controller(CuisineController::class)->group(function(){
        Route::get('/cuisine/index','index')->name('cuisine.index');
        Route::get('/cuisine/create','create')->name('cuisine.create');
        Route::post('/cuisine/store','store')->name('cuisine.store');
        Route::get('/cuisine/edit/{id}','edit')->name('cuisine.edit');
        Route::post('/cuisine/update','update')->name('cuisine.update');
        Route::get('/cuisine/delete/{id}','delete')->name('cuisine.delete');
    });