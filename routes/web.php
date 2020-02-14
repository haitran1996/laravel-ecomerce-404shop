<?php

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

use Illuminate\Support\Facades\Route;
Route::get('/redirect/{social}', 'SocialAuthController@redirect')
    ->name("redirect.social");
Route::get('/callback/{social}', 'SocialAuthController@callback')
    ->name("callback.social");
Route::prefix('login')->group(function () {
    Route::get('', 'LoginController@index')->name('login');
    Route::post('', 'LoginController@login');
    Route::get('/register', function () {
        return view('login.register');
    })->name('login.show.register');
    Route::post('/register', 'LoginController@register');
    Route::get('/logout', 'LoginController@logout')->name("login.logout");
});

Route::get("locale/{lang}", "LocaleController@switchLocale")->name("switch.locale");

Route::middleware(['checkLogin', 'keepLocale'])->prefix('admin')->group(function () {
    Route::get('',function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@index')->name('admin.users.index');
        Route::post('/search', 'UserController@search')->name('admin.users.search');
    });
    Route::prefix('categories')->group(function () {
        Route::get('','CategoryController@index')->name('admin.categories.index');
        Route::get('/create','CategoryController@create')->name('admin.categories.create');
        Route::post('/store','CategoryController@store')->name('admin.categories.store');
        Route::get('{id}/edit','CategoryController@edit')->name('admin.categories.edit');
        Route::post('{id}/update','CategoryController@update')->name('admin.categories.update');
        Route::get('{id}','CategoryController@delete')->name('admin.categories.delete');
        Route::post('/search', 'CategoryController@search')->name('admin.categories.search');
    });
    Route::prefix('products')->group(function () {
        Route::get('','ProductController@index')->name('admin.products.index');
        Route::get('/create','ProductController@create')->name('admin.products.create');
        Route::post('/store','ProductController@store')->name('admin.products.store');
        Route::post('{id}/update','ProductController@update')->name('admin.products.update');
        Route::get('{id}/edit','ProductController@edit')->name('admin.products.edit');
        Route::get('{id}','ProductController@delete')->name('admin.products.delete');
        Route::post('/search', 'ProductController@search')->name('admin.products.search');
    });

    Route::prefix('customer')->group(function () {
        Route::get('index', "TaskManagerController@index");

        Route::get('create', "TaskManagerController@create");

        Route::post('store', function () {
            // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form
        });

        Route::get('{id}/show', "TaskManagerController@show");

        Route::get('{id}/edit', "TaskManagerController@edit");

        Route::patch('{id}/update', function () {
            // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
        });

        Route::delete('{id}', function () {
            // Xóa thông tin dữ liệu khách hàng
        });
    });
});

Route::prefix('404shop')->group(function () {
    Route::get('', function () {
        return view('shop.home');
    })->name('shop.index');

    Route::prefix('cart')->group(function () {
        Route::get('', 'CartController@index')->name('cart.index');
        Route::post('add/{idProduct}', 'CartController@add')->name('cart.add');
        Route::post('update', 'CartController@update')->name('cart.update');
        Route::get('{id}', 'CartController@delete')->name('cart.delete');
        Route::get('clear', 'CartController@clear')->name('cart.clear');
    });

    Route::prefix('products')->group(function () {
        Route::get('{id}/show','ProductController@show')->name('products.show');
    });

});

