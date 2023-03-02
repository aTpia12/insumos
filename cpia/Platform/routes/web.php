<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RemissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubsidiaryController;
use App\Http\Controllers\SubsidiaryCustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', HomeController::class)->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);

//Customers
Route::resource('customers', CustomerController::class);
//Subsidiaries
Route::resource('subsidiaries', SubsidiaryController::class);

//Inventories
Route::resource('inventories', InventoryController::class);

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Roles
Route::post('/role/{id}', [RoleController::class, 'updateRole'])->name('role.update');

Route::resource('/stores', StoreController::class);
Route::resource('/products', ProductController::class);

//Cotizaciones
Route::prefix('quotes')->group(function (){
    Route::get('create', [QuotationController::class, 'index'])->name('quotation.create');
    Route::get('list', [QuotationController::class, 'list'])->name('quotation.list');
    Route::post('store', [QuotationController::class, 'store'])->name('quotation.store');
    Route::get('pdf', [QuotationController::class, 'pdf'])->name('quotation.pdf');
});

//Notas de remisión
Route::prefix('remissions')->group(function (){
    Route::get('create/{id}', [RemissionController::class, 'index'])->name('remissions.create');
    Route::post('store', [RemissionController::class, 'store'])->name('remissions.store');
});

Route::get('/email', function(){
    return view('emails.cotizaciones');
});
