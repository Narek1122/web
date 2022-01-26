<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::prefix('home')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home');

});

Route::prefix('user')->group(function () {
    Route::get('register',[UserController::class,'registerPage'])->name('registerPage');
    Route::get('login',[UserController::class,'login'])->name('login');
    Route::post('sign-up',[UserController::class,'signUp'])->name('signUp');
    Route::post('sign-in',[UserController::class,'signIn'])->name('signIn');
    Route::get('profile',[UserController::class,'profile'])->name('userProfile');
});


Route::group(['middleware' => ['checkAuth']],function(){
    Route::group(['middleware' => ['checkAdminAuth']],function(){
        Route::prefix('admin')->group(function () {
            Route::get('profile',[AdminController::class,'index'])->name('adminProfile');
        });
    });
    Route::group(['middleware' => ['checkUserAuth']],function(){
        Route::prefix('user')->group(function () {
            Route::get('profile',[UserController::class,'profile'])->name('userProfile');
            Route::get('edit',[UserController::class,'profileEdit'])->name('userEditProfile');
            Route::post('edit',[UserController::class,'userEditProfileData'])->name('userEditProfileData');
        });
    });

});







