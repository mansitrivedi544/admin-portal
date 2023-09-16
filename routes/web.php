<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/login', [AdminController::class, 'getLogin'])->name('adminLogin');
Route::post('admin/login', [AdminController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/login', [AdminController::class, 'logout'])->name('adminLogout');


Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	// Admin Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});
