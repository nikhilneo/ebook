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

// All of the admin routes are here
Route::get('admins', 'Admin\AdminController@otherAdmins')->name('admin.list');
Route::group(['prefix' => 'admin'], function () {
    Route:: get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route:: post('/login', 'AdminAuth\LoginController@login');
    Route:: post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route:: get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    Route:: post('/register', 'Admin\AdminController@store');
    Route:: post('/change_password', 'Admin\AdminController@changePassword');

    //   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    //   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
    //   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    //   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    Route:: resource('books', 'Admin\BookController');

    Route:: get('/profile', 'Admin\AdminController@showProfile')->name('admin.profile');

    Route:: get('/orders', 'Admin\OrderController@index');
    Route:: put('/orders/update/{order}', 'Admin\OrderController@update');
    Route:: get('/orders/{order}', 'Admin\OrderController@show')->name('admin.orders.show');

    Route:: delete('/users/{id}','Admin\AdminController@userDestroy')->name('admin.user.delete');
    Route:: put('/users/{user}/', 'Admin\AdminController@userUpdate')->name('admin.user.update');
    Route:: get('/users/{user}/edit', 'Admin\AdminController@userEdit')->name('admin.user.edit');
    Route:: get('/users/register', 'Admin\AdminController@userCreate');
    Route:: post('/users/register', 'Admin\AdminController@userStore');
    Route:: get('/users/{admin}', 'Admin\AdminController@userShow')->name('admin.user.show');
    Route:: get('/users', 'Admin\AdminController@users')->name('admin.user');

    Route:: delete('/{id}','Admin\AdminController@destroy')->name('admin.delete');
    Route:: put('/{id}', 'Admin\AdminController@update')->name('admin.update');
    Route:: get('/{admin}/edit', 'Admin\AdminController@edit')->name('admin.edit');
    Route:: get('/{admin}', 'Admin\AdminController@show')->name('admin.show');
    Route:: get('/', 'Admin\AdminController@index')->name('admin');
});

// Pages which are accessed by only LoggedIn Users
Route::group(['middleware' => ['auth']], function () {
  
    Route:: put('/change-password', 'PagesController@editChangePassword')->name('changePassword');
    Route:: get('/change-password', 'PagesController@showChangePassword')->name('changePassword');
    Route:: get('/wish-list', 'PagesController@showWishList')->name('myWishList');
    Route:: get('/my-profile', 'PagesController@showProfile')->name('myProfile');
    Route:: get('/paypal-request', 'PayPalController@requestCheckOut')->name('paypal.checkout');
    Route:: get('/order-success', 'CartController@createOrder')->name('create.order');
    Route:: get('/order-detail/{id}', 'PagesController@orderDetails')->name('show.cart.details');
    Route:: get('/paypal-success', 'PayPalController@responseCheckOut');
    Route:: get('/paypal-cancel', 'PayPalController@cancelCheckOut');
});

// This route only accessed by loggedOut users
Route::group(['middleware' => ['guest']], function () {
    Route:: get('/my-account', 'PagesController@loginPage')->name('login');
});

// Pages with web middleware are here
Route::group([], function () {

    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::post('/register', 'Auth\RegisterController@register');

    // Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    // Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.email');
    // Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    // Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route:: get('/shop-grid', 'BookController@index')->name('books.list');
    Route:: get('/pages/single-product/{book}', 'BookController@show')->name('books.view');
    
    Route:: delete('/cart/{cart}', 'CartController@cartRemove')->name('cart.remove');
    Route:: post('/cart/update', 'CartController@cartUpdate')->name('cart.update');
    Route:: post('/cart', 'CartController@cartAdd')->name('cart.add');
    Route:: get('/cart-detail', 'PagesController@cartPage')->name('cart.show');
    Route:: get('/{page}', 'PagesController@getPages');
    Route:: get('/', 'PagesController@getIndex');
});



