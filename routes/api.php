<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/register', [UserController::class, 'store'])->name('user.create');
Route::post('user/login', [SessionController::class, 'store'])->name('session.create');
Route::middleware(['token'])->group(function () {
    Route::post('user/message', [MessageController::class, 'store'])->name('message.create');
    Route::post('user/message/reply', [MessageController::class, 'reply'])->name('message.reply');
});
