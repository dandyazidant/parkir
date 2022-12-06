<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkirController;

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
//     return view('default');
// });

Route::get('/', [ParkirController::class,'index'])->name('index');
Route::get('/add', [ParkirController::class,'create'])->name('create');
Route::post('/add', [ParkirController::class,'store'])->name('store');
Route::post('/checkout', [ParkirController::class,'storecheckout'])->name('storecheckout');
Route::post('/data', [ParkirController::class,'get_data'])->name('get_data');

