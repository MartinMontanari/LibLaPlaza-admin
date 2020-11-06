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
Route::get('/home', [App\Http\Actions\HomeController::class, 'index'])->name('home')->middleware('auth');;

Route::middleware('auth')->prefix('dashboard')->group(
    function(){
        //categories routes
        Route::view('category/new', '/admin/categories/new')->name('new-category');
        Route::post('categories',[\App\Http\Actions\Categories\StoreCategoryAction::class,'__invoke'])->name('store-category');
        Route::get('categories',[\App\Http\Actions\Categories\IndexCategoriesAction::class,'__invoke'])->name('list-categories');
        Route::put('categories/{id}',[\App\Http\Actions\Categories\UpdateCategoryAction::class,'__invoke'])->name('update-category');
        Route::get('category/edit',[\App\Http\Actions\Categories\UpdateCategoryAction::class,'index'])->name('edit-category');
        Route::delete('categories/{id}', [\App\Http\Actions\Categories\DeleteCategoryAction::class,'__invoke'])->name('delete-category');
    }
);
