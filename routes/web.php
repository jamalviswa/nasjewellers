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

use App\Http\Controllers\InstocksController;
use App\Http\Controllers\BillingsController;
use App\Http\Controllers\ItemsController;

use App\Http\Controllers\AdminusersController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\OutstocksController;
use App\Http\Controllers\JewelriesController;
use App\Http\Controllers\NonbillingsController;
use App\Http\Controllers\DealersController;


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminusersController::class, 'login'])->name('adminusers.login')->middleware('guest');
    Route::get('/login', [AdminusersController::class, 'login'])->name('adminusers.login')->middleware('guest');
    Route::post('/store', [AdminusersController::class, 'store'])->name('adminusers.store')->middleware('guest');
    Route::get('/forgotpassword', [AdminusersController::class, 'forgotpassword'])->name('adminusers.forgotpassword')->middleware('guest');
    Route::get('/profile', [AdminusersController::class, 'profile'])->name('adminusers.profile')->middleware('auth');
    Route::get('/logout', [AdminusersController::class, 'logout'])->name('adminusers.logout');

    Route::get('/dashboard/index', [DashboardsController::class, 'index'])->name('dashboards.index')->middleware('auth');

    //Completed
    Route::get('/instocks/index', [InstocksController::class, 'index'])->name('instocks.index')->middleware('auth');
    Route::get('/instocks/add', [InstocksController::class, 'add'])->name('instocks.add')->middleware('auth');
    Route::post('/instocks/store', [InstocksController::class, 'store'])->name('instocks.store')->middleware('auth');
    Route::post('/instocks/ajax', [InstocksController::class, 'ajax'])->name('instocks.ajax');
    Route::get('/instocks/view/{id}', [InstocksController::class, 'view'])->name('instocks.view')->middleware('auth');
    Route::get('/instocks/edit/{id}', [InstocksController::class, 'edit'])->name('instocks.edit')->middleware('auth');
    Route::post('/instocks/update/{id}', [InstocksController::class, 'update'])->name('instocks.update')->middleware('auth');
    Route::get('/instocks/delete/{id}', [InstocksController::class, 'delete'])->name('instocks.delete')->middleware('auth');

    //Completed
    Route::get('/outstocks/index', [OutstocksController::class, 'index'])->name('outstocks.index')->middleware('auth');
    Route::get('/outstocks/add', [OutstocksController::class, 'add'])->name('outstocks.add')->middleware('auth');
    Route::post('/outstocks/store', [OutstocksController::class, 'store'])->name('outstocks.store')->middleware('auth');
    Route::post('/outstocks/ajax', [OutstocksController::class, 'ajax'])->name('outstocks.ajax');
    Route::get('/outstocks/view/{id}', [OutstocksController::class, 'view'])->name('outstocks.view')->middleware('auth');
    Route::get('/outstocks/delete/{id}', [OutstocksController::class, 'delete'])->name('outstocks.delete')->middleware('auth');

    //pending
    Route::get('/outstocks/edit/{id}', [OutstocksController::class, 'edit'])->name('outstocks.edit')->middleware('auth');
    Route::post('/outstocks/update/{id}', [OutstocksController::class, 'update'])->name('outstocks.update')->middleware('auth');

    // Completed



    Route::get('/billings/edit/{id}', [BillingsController::class, 'edit'])->name('billings.edit')->middleware('auth');
    Route::post('/billings/update/{id}', [BillingsController::class, 'update'])->name('billings.update')->middleware('auth');


    // Completed
    Route::get('/nonbillings/index', [NonbillingsController::class, 'index'])->name('nonbillings.index')->middleware('auth');
    Route::get('/nonbillings/add', [NonbillingsController::class, 'add'])->name('nonbillings.add')->middleware('auth');
    Route::post('/nonbillings/store', [NonbillingsController::class, 'store'])->name('nonbillings.store')->middleware('auth');
    Route::get('/nonbillings/view/{id}', [NonbillingsController::class, 'view'])->name('nonbillings.view')->middleware('auth');
    Route::get('/nonbillings/delete/{id}', [NonbillingsController::class, 'delete'])->name('nonbillings.delete')->middleware('auth');

    Route::get('/nonbillings/invoicepdf/{id}', [NonbillingsController::class, 'invoicepdf'])->name('nonbillings.invoicepdf')->middleware('auth');
    Route::get('/nonbillings/receiptform/{id}', [NonbillingsController::class, 'receiptform'])->name('nonbillings.receiptform')->middleware('auth');

    //pending
    Route::get('/nonbillings/edit/{id}', [NonbillingsController::class, 'edit'])->name('nonbillings.edit')->middleware('auth');
    Route::post('/nonbillings/update/{id}', [NonbillingsController::class, 'update'])->name('nonbillings.update')->middleware('auth');

    // Completed
    Route::get('/items/index', [ItemsController::class, 'index'])->name('items.index')->middleware('auth');

    Route::get('/items/view/{id}', [ItemsController::class, 'view'])->name('items.view')->middleware('auth');
    Route::get('/items/edit/{id}', [ItemsController::class, 'edit'])->name('items.edit')->middleware('auth');
    Route::post('/items/update/{id}', [ItemsController::class, 'update'])->name('items.update')->middleware('auth');
    Route::get('/items/delete/{id}', [ItemsController::class, 'delete'])->name('items.delete')->middleware('auth');


    Route::get('/jewelries/index', [JewelriesController::class, 'index'])->name('jewelries.index')->middleware('auth');
    Route::get('/jewelries/add', [JewelriesController::class, 'add'])->name('jewelries.add')->middleware('auth');
    Route::post('/jewelries/store', [JewelriesController::class, 'store'])->name('jewelries.store')->middleware('auth');
    Route::get('/jewelries/edit/{id}', [JewelriesController::class, 'edit'])->name('jewelries.edit')->middleware('auth');
    Route::post('/jewelries/update/{id}', [JewelriesController::class, 'update'])->name('jewelries.update')->middleware('auth');
    Route::get('/jewelries/delete/{id}', [JewelriesController::class, 'delete'])->name('jewelries.delete')->middleware('auth');
    Route::get('/jewelries/view/{id}', [JewelriesController::class, 'view'])->name('jewelries.view')->middleware('auth');









    // Completed Sections
    Route::get('/items/add', [ItemsController::class, 'add'])->name('items.add')->middleware('auth');
    Route::post('/items/store', [ItemsController::class, 'store'])->name('items.store')->middleware('auth');

    Route::get('/dealers/index', [DealersController::class, 'index'])->name('dealers.index')->middleware('auth');
    Route::get('/dealers/add', [DealersController::class, 'add'])->name('dealers.add')->middleware('auth');
    Route::post('/dealers/store', [DealersController::class, 'store'])->name('dealers.store')->middleware('auth');
    Route::get('/dealers/edit/{id}', [DealersController::class, 'edit'])->name('dealers.edit')->middleware('auth');
    Route::post('/dealers/update/{id}', [DealersController::class, 'update'])->name('dealers.update')->middleware('auth');
    Route::get('/dealers/view/{id}', [DealersController::class, 'view'])->name('dealers.view')->middleware('auth');
    Route::get('/dealers/delete/{id}', [DealersController::class, 'delete'])->name('dealers.delete')->middleware('auth');

    Route::get('/billings/index', [BillingsController::class, 'index'])->name('billings.index')->middleware('auth');
    Route::get('/billings/add', [BillingsController::class, 'add'])->name('billings.add')->middleware('auth');
    Route::post('/billings/store', [BillingsController::class, 'store'])->name('billings.store')->middleware('auth');
    Route::post('/billings/ajax', [BillingsController::class, 'ajax'])->name('billings.ajax');
    Route::get('/billings/view/{id}', [BillingsController::class, 'view'])->name('billings.view')->middleware('auth');
    Route::get('/billings/delete/{id}', [BillingsController::class, 'delete'])->name('billings.delete')->middleware('auth');
});
