<?php

use App\Http\Controllers\Auth\super_admin\SuperAdminController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('front');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**  Super Admin Group  */
Route::group(['prefix'=>'store-admin','as'=>'store_admin.'],function(){
    Route::group(['middleware'=>['auth:super_admin']],function(){
        Route::controller(SuperAdminController::class)->group(function(){
            Route::get('/dashboard','index')->name('dashboard');
        });
    });
   
    // Route::get('/register', [App\Http\Controllers\Auth\super_admin\SuperAdminRegisterController::class, 'index']);
    Route::get('/login', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'index']);
    Route::post('/login', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'logout'])->name('logout');
    // Route::post('/register', [App\Http\Controllers\Auth\super_admin\SuperAdminRegisterController::class, 'create'])->name('create');
});