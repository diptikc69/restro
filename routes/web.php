<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RestaurantController;


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

route::get('/', [HomeController::class, 'index'])->name('home');

//Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'
//])->group(function () {
//Route::get('/dashboard', function () {
//return view('dashboard');
//})->name('dashboard');
//});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('dashboard', [HomeController::class, 'redirect'])->name('dashboard')->middleware('auth');
Route::group(['middleware' => 'admin'], function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('tables', TableController::class);
});
