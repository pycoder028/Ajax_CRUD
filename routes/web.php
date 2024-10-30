<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('products');
}); */

Route::get('/',[productController::class, 'products'])->name('products');