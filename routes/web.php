<?php

use App\Http\Controllers\chatController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('chat', [chatController::class, 'index'])->name('chat');
// Route::post('gatime', [chatController::class, 'gptPromt'])->name('test');


Route::get('gatime', [chatController::class, 'gptPromt'])->name('test');
Route::post('gatime', [chatController::class, 'gptPromt'])->name('test');