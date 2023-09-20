<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;


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
Route::get('Logout', [AdminController::class, 'logout'])->name('adminLogout');


Route::group(['prefix' => 'admin', 'middleware' => 'adminauth'], function () {
    // Admin 
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('companyList', [CompanyController::class, 'index'])->name('companyList');
    Route::get('changeStatus', [CompanyController::class, 'changeStatus'])->name('changeStatus');
    Route::get('createCompany', [CompanyController::class, 'create'])->name('createCompany');
    Route::post('storeCompany', [CompanyController::class, 'store'])->name('storeCompany');
    Route::get('editCompany/{id}', [CompanyController::class, 'edit'])->name('editCompany');
    Route::put('updateCompany', [CompanyController::class, 'update'])->name('updateCompany');
    Route::get('viewCompany/{id}', [CompanyController::class, 'show'])->name('viewCompany');
    Route::post('deleteCompany', [CompanyController::class, 'destroy'])->name('deleteCompany');;
});

Route::get('company/login', [CompanyController::class, 'getLogin'])->name('companyLogin');
Route::post('company/login', [CompanyController::class, 'postLogin'])->name('companyLoginPost');
Route::get('companyLogout', [CompanyController::class, 'logout'])->name('companyLogout');

Route::group(['prefix' => 'company', 'middleware' => 'companyauth'], function () {
    // Company 
    Route::get('dashboard', [CompanyController::class, 'dashboard'])->name('companyDashboard');
    Route::get('productList', [ProductController::class, 'index'])->name('productList');
    Route::get('createProduct', [ProductController::class, 'create'])->name('createProduct');
    Route::post('storeProduct', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('editProduct/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::put('updateProduct', [ProductController::class, 'update'])->name('updateProduct');
    Route::post('productCompany', [ProductController::class, 'destroy'])->name('deleteProduct');
    Route::get('/file-import', [ProductController::class, 'importView'])->name('import-view');
    Route::post('/import', [ProductController::class, 'import'])->name('import');
});

