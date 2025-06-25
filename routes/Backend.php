<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileControllers;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\CousineController;
use App\Http\Controllers\Backend\DietryRestrictionsController;
use App\Http\Controllers\Backend\AllergenController;
use App\Http\Controllers\Backend\ProductController;




Route::middleware('admin')->group(function () {

    //Dashboard Controller
   Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard','index')->name('dashboard');
   });

   // Profile Controller
   Route::controller(ProfileControllers::class)->group(function(){
    Route::get('/profile','updateProfile')->name('profile');
    Route::post('/profile/update','update')->name('update.profile');
    Route::post('/profile/update/password','updatePassword')->name('profile.update.password');
   });

   //User Manage Controller
   Route::controller(UserController::class)->group(function(){
    Route::get('/user/manage','index')->name('user.index');
    Route::get('/user/get/all','allUser')->name('getUsers');
    Route::post('/user/manage/store','store')->name('user.store');
    Route::get('/user/manage/edit/{id}','edit')->name('user.edit');
    Route::post('/user/manage/update/{id}','update')->name('user.update');
    Route::get('/user/manage/delete/{id}','delete')->name('user.delete');
   });

    Route::controller(RoleController::class)->group(function(){
        Route::get('/role/manage','index')->name('role.index');
        Route::get('/role/get/all','allRole')->name('getRoles');
        Route::post('/role/manage/store','store')->name('roles.store');
        Route::get('/role/manage/edit/{id}','edit')->name('role.edit');
        Route::post('/role/manage/update','update')->name('roles.update');
        Route::get('/role/manage/delete/{id}','delete')->name('role.delete');
    });

    Route::controller(PermissionController::class)->group(function(){
        Route::get('/permission/manage','index')->name('permission.index');
        Route::get('/permission/get/all','allPermission')->name('getPermissions');
        Route::post('/permission/manage/store','store')->name('permission.store');
        Route::get('/permission/manage/edit/{id}','edit')->name('permission.edit');
        Route::post('/permission/manage/update','update')->name('permission.update');
        Route::get('/permission/manage/delete/{id}','delete')->name('permission.delete');
        Route::get('/permission/manage/assign','getPermission')->name('getPermission');
    });
 Route::controller(CousineController::class)->group(function(){
        Route::get('/cousine/manage','index')->name('cousine.index');
        Route::get('/cousine/get/all','allCousine')->name('getCousines');
        Route::post('/cousine/manage/store','store')->name('cousines.store');
        Route::get('/cousine/manage/edit/{id}','edit')->name('cousine.edit');
        Route::post('/cousine/manage/update','update')->name('cousines.update');
        Route::post('/cousine/manage/delete','delete')->name('cousines.destroy');
    });

    Route::controller(DietryRestrictionsController::class)->group(function(){
        Route::get('/dietry/restrictions/manage','index')->name('dietry.restrictions.index');
        Route::get('/dietry/restrictions/get/all','allDietryRestrictions')->name('getDietryRestrictions');
        Route::post('/dietry/restrictions/manage/store','store')->name('restriction.store');
        Route::get('/dietry/restrictions/manage/edit/{id}','edit')->name('dietry.restrictions.edit');
        Route::post('/dietry/restrictions/manage/update','update')->name('dietry.restrictions.update');
        Route::get('/dietry/restrictions/manage/delete/{id}','delete')->name('dietry.restrictions.destroy');
    });


    Route::controller(AllergenController::class)->group(function () {
        Route::get('/allergens', 'index')->name('allergens.index');
        Route::post('/allergens/store', 'store')->name('allergens.store');
        Route::get('/allergens/edit/{id}', 'edit')->name('allergens.edit');
        Route::post('/allergens/update/{id}', 'update')->name('allergens.update');
        Route::delete('/allergens/delete/{id}', 'destroy')->name('allergens.destroy');
    });


        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


});

