<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'category']);
Route::get('create_category', [App\Http\Controllers\Admin\CategoryController::class, 'create_category']);
Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'insert_category']);
Route::get('edit_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit_category']);
Route::post('edit_category/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update_category']);
Route::get('edit_category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'delete']);


// products routes
Route::get('product', [App\Http\Controllers\ProductController::class, 'product']);
Route::get('create_product', [App\Http\Controllers\ProductController::class, 'create_product']);
Route::post('product', [App\Http\Controllers\ProductController::class, 'insert_product']);
Route::get('edit_product/{id}', [App\Http\Controllers\ProductController::class, 'edit_product']);
Route::put('edit_product/{id}',[App\Http\Controllers\ProductController::class, 'update_product']);
Route::get('edit_product/delete/{id}',[App\Http\Controllers\ProductController::class, 'delete']);


// slider routes
Route::get('slider', [App\Http\Controllers\SliderController::class, 'slider']);
Route::get('create_slider', [App\Http\Controllers\SliderController::class, 'create_slider']);
Route::post('slider', [App\Http\Controllers\SliderController::class, 'insert_slider']);
Route::get('edit_slider/{id}', [App\Http\Controllers\SliderController::class, 'edit_slider']);
Route::put('edit_slider/{id}',[App\Http\Controllers\SliderController::class, 'update_slider']);
Route::get('edit_slider/delete/{id}',[App\Http\Controllers\SliderController::class, 'delete']);

});