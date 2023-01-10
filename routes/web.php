<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\super_admin\SuperAdminController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\FrontController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('front');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\frontend\ProductController::class, 'products'])->name('products');

Route::get('/product_detail/{product_id}', [App\Http\Controllers\frontend\ProductController::class, 'product_detail'])->name('product_detail');

/**  Frontend Group  **/
Route::controller(FrontController::class)->group(function(){
    Route::get('/','index')->name('dashboard')->name('front');
});

/**  Super Admin Group  */
Route::group(['prefix'=>'store-admin','as'=>'store_admin.'],function(){
    Route::group(['middleware'=>['auth:super_admin']],function(){
        Route::controller(SuperAdminController::class)->group(function(){
            Route::get('/dashboard','index')->name('dashboard');
            Route::get('/users/list','users_list')->name('users.list');
            Route::get('/users/list_datatable','get_admin_list_datatable')->name('get_admin_list.datatable');
            Route::get('/users/create','create')->name('user.create');
        });
    });
   
    Route::get('/register', [App\Http\Controllers\Auth\super_admin\SuperAdminRegisterController::class, 'index']);
    Route::get('/login', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'index']);
    Route::post('/login', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'login'])->name('login');
    Route::get('/logout', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'logout'])->name('logout');
    Route::post('/register', [App\Http\Controllers\Auth\super_admin\SuperAdminRegisterController::class, 'create'])->name('create');

    Route::group(['middleware'=>['auth:super_admin']],function(){
        Route::controller(ProductController::class)->group(function(){
            Route::get('/product/creat','create')->name('product.create');
            Route::post('/product/store','store')->name('product.store');
            
            Route::get('/product/creat','create')->name('product.create');
            // Route::get('/users/create','create')->name('user.create');
        });
    });

    Route::group(['middleware'=>['auth:super_admin']],function(){
        Route::controller(BannerController::class)->group(function(){
            Route::get('/banner/all','index')->name('banner.all');
            Route::get('/banner/create','create')->name('banner.create');
            Route::get('/banner/edit/{id}','edit')->name('banner.edit');
            Route::post('/banner/store','store')->name('banner.store');
            Route::put('/banner/update/{id}','update')->name('banner.update');
            Route::get('/banner/delete/{id}','delete')->name('banner.delete');
        });
    });
});

