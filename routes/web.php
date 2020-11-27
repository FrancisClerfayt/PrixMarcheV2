<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::resource('Category', 'CategoryController');
Route::resource('Product', 'ProductController');
Route::resource('Cart', 'CartController');
Route::resource('CartProduct', 'CartProductController');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/question', 'HomeController@question')->name('question');
Route::get('/conditions', 'HomeController@conditions')->name('conditions');
Route::get('/delivery', 'HomeController@delivery')->name('delivery');

Route::get('/account/{id}', 'HomeController@account')->name('account');
Route::get('/orders/{id}', 'HomeController@orders')->name('orders');
Route::get('/ordersdetail/{id}', 'HomeController@ordersDetail')->name('orders.detail');
Route::get('/accountdetail/{id}', 'HomeController@accountDetail')->name('account.detail');
Route::post('/accountupdate/{id}', 'HomeController@accountUpdate')->name('account.update');
Route::get('/allcategory', 'HomeController@category')->name('allcategory');
Route::get('/category/{id}', 'HomeController@categoryDetail')->name('category.detail');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/pendingcart/{id}', 'HomeController@pendingCart')->name('pendingcart');
Route::get('/checkout/{id}', 'HomeController@checkout')->name('checkout');