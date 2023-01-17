<?php

use App\Http\Controllers\backend\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\PostController;

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

// Route::get('/dr', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\frontend\ProductController::class, 'products'])->name('products');
Route::get('/products/laptops', [App\Http\Controllers\frontend\ProductController::class, 'products_laptop'])->name('products.laptop');

Route::get('/product_detail/{product_id}', [App\Http\Controllers\frontend\ProductController::class, 'product_detail'])->name('product_detail');

Route::get('/news', [App\Http\Controllers\frontend\NewsController::class, 'news']);
Route::get('/contact', [App\Http\Controllers\frontend\ContactController::class, 'contact']);

Route::post('/user/update/{id}', [App\Http\Controllers\HomeController::class, 'user_update'])->name('user.update');

/**  Frontend Group  **/
Route::controller(FrontController::class)->group(function(){
    Route::get('/','index')->name('dashboard')->name('front');
});

/**  Super Admin Group  */
Route::group(['prefix'=>'store-admin','as'=>'store_admin.'],function(){
    Route::group(['middleware'=>['auth:web']],function(){
        Route::controller(AdminController::class)->group(function(){
            Route::get('/dashboard','index')->name('dashboard');
            Route::get('/users/list','users_list')->name('users.list');
            Route::get('/users/list_datatable','get_admin_list_datatable')->name('get_admin_list.datatable');
            Route::get('/users/create','create')->name('user.create');
        });
    });
   
    Route::get('/register', [App\Http\Controllers\Auth\super_admin\SuperAdminRegisterController::class, 'index']);
    Route::get('/login', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'index']);
    // Route::post('/login', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'login'])->name('login');
    // Route::get('/logout', [App\Http\Controllers\Auth\super_admin\SuperAdminLoginController::class, 'logout'])->name('logout');
    Route::post('/admin_register', [App\Http\Controllers\Auth\super_admin\SuperAdminRegisterController::class, 'create'])->name('role.create');

    Route::group(['middleware'=>['auth:web']],function(){
        Route::controller(ProductController::class)->group(function(){
            Route::get('/product/list','index')->name('product.list');
            Route::get('/product/creat','create')->name('product.create');
            Route::post('/product/store','store')->name('product.store');
            Route::get('/product/edit/{id}','edit')->name('product.edit');
            Route::put('/product/update/{id}','update')->name('product.update');
            Route::delete('/product/delete/{id}','destroy')->name('product.delete');
        });
    });

    Route::group(['middleware'=>['auth:web']],function(){
        Route::controller(BannerController::class)->group(function(){
            Route::get('/banner/all','index')->name('banner.all');
            Route::get('/banner/create','create')->name('banner.create');
            Route::get('/banner/edit/{id}','edit')->name('banner.edit');
            Route::post('/banner/store','store')->name('banner.store');
            Route::put('/banner/update/{id}','update')->name('banner.update');
            Route::get('/banner/delete/{id}','delete')->name('banner.delete');
        });
    });


    Route::group(['middleware'=>['auth:web']],function(){
        Route::controller(PostController::class)->group(function(){
            Route::get('/post/all','index')->name('post.all');
            Route::get('/post/create','create')->name('post.create');
            Route::get('/post/edit/{post}','edit')->name('post.edit');
            Route::post('/post/store','store')->name('post.store');
            Route::put('/post/update/{post}','update')->name('post.update');
            Route::delete('/post/delete/{post}','destroy')->name('post.delete');
        });
    });


});




