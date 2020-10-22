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

//Auth routes
Auth::routes();

//------------------------------ ADMIN ROUTES ------------------------------
//Home dashboard route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;

//categories routes
Route::view('/dashboard/category/new', '/admin/categories/new')->name('new-category')->middleware('auth');
Route::post('/dashboard/categories',[\App\Http\Controllers\Categories\StoreCategoryController::class,'__invoke'])->name('store-category')->middleware('auth');
Route::get('/dashboard/categories',[\App\Http\Controllers\Categories\IndexCategoriesController::class,'__invoke'])->name('find-all-categories')->middleware('auth');
Route::delete('/dashboard/categories/{id}', [\App\Http\Controllers\Categories\DeleteCategoryController::class,'__invoke'])->name('delete-category')->middleware('auth');
