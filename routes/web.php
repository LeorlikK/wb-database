<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
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
Route::get('/main', function () {
    return view('main');
});

Route::get('/income/{page?}', [IncomeController::class, 'index'])->name('income.index');
Route::get('/income/show/{income}/{page?}', [IncomeController::class, 'show'])->name('income.show');

Route::get('/order/{page?}', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/show/{order}/{page?}', [OrderController::class, 'show'])->name('order.show');

Route::get('/sale/{page?}', [SaleController::class, 'index'])->name('sale.index');
Route::get('/sale/show/{sale}/{page?}', [SaleController::class, 'show'])->name('sale.show');

Route::get('/stock/{page?}', [StockController::class, 'index'])->name('stock.index');
Route::get('/stock/show/{stock}/{page?}', [StockController::class, 'show'])->name('stock.show');
