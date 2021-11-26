<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CalculatorController;

Route::resource('posts', PostController::class);

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/calculator', function () {
    return view('calculator.index');
})->middleware(['auth'])->name('calculator');

Route::post('/calculator', [CalculatorController::class, 'store']);

Route::get('/calculate-function', [CalculatorController::class, 'calculate']);

