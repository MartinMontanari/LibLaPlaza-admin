<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
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
    if(Auth::user()!=null){
        return redirect(route('home'));
    }
    else{
        return redirect(route('login'));
    }
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//categories routes
Route::view('/dashboard/category/new', '/admin/categories/new')->name('new_category');
Route::post('/categories/new',[\App\Http\Controllers\Categories\StoreCategoryController::class,'__invoke'])->name('storeCategory');
Route::get('/categories',[\App\Http\Controllers\Categories\IndexCategoriesController::class,'__invoke'])->name('findAllCategories');
