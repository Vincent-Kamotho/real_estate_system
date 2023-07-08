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
//     return view('clients.index');
// })->name('home')->middleware('auth');

Auth::routes();
Route::get('/' , [App\Http\Controllers\Clients\ClientsController::class, 'index'])->name('home')->middleware('auth');
Route::get('search', [App\Http\Controllers\Clients\ClientsController::class, 'searchProperty'])->name('search_property');
Route::get('contact', [App\Http\Controllers\Clients\ClientsController::class, 'contact'])->name('contact')->middleware('auth');
Route::post('email_contact', [App\Http\Controllers\Clients\ClientsController::class, 'email'])->name('email_contact')->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware' => ['auth' , 'is_admin']], function(){
    Route::get('/home', [App\Http\Controllers\Admin\AdminHomeController::class, 'index'])->name('admin_home');

    Route::group(['prefix' => '/listings'], function () {
        Route::get('show_listings', [App\Http\Controllers\Admin\Listings\ListingsController::class, 'index'])->name('show_listings');
        Route::get('add_listing', [App\Http\Controllers\Admin\Listings\ListingsController::class, 'create'])->name('add_listings');
        Route::post('save_listing', [App\Http\Controllers\Admin\Listings\ListingsController::class, 'store'])->name('post_listing');
        Route::get('edit/{id}', [App\Http\Controllers\Admin\Listings\ListingsController::class,'edit'])->name('edit_listing');
        Route::post('update_record/{id}',[App\Http\Controllers\Admin\Listings\ListingsController::class,'update'])->name('update_listing');
        Route::get('delete/{id}', [App\Http\Controllers\Admin\Listings\ListingsController::class, 'destroy'])->name('delete_item');
    });

    Route::group(['prefix' => '/owners'], function () {
        Route::get('owners', [App\Http\Controllers\Admin\Owners\OwnersController::class, 'index'])->name('owners');
        Route::get('add_owners', [App\Http\Controllers\Admin\Owners\OwnersController::class,'create'])->name('add_owners');
        Route::post('save_owner', [App\Http\Controllers\Admin\Owners\OwnersController::class, 'store'])->name('save_owners');
        Route::get('edit/{id}', [App\Http\Controllers\Admin\Owners\OwnersController::class, 'edit']);
        Route::post('update_owner/{id}', [App\Http\Controllers\Admin\Owners\OwnersController::class, 'update'])->name('update_owner');
        Route::get('delete/{id}', [App\Http\Controllers\Admin\Owners\OwnersController::class, 'destroy']);
    });
});



