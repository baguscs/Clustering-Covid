<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SebaranController;
use App\Http\Controllers\ResultController;

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
    return view('login_page');
})->name('login_page');

Route::get('LogoutSystem', [AuthController::class, 'logout'])->name('logoutSystem');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::resource('sebaran', SebaranController::class);

    Route::get('hitung', [ResultController::class, 'index'])->name('result');
    Route::get('detail-hasil', [ResultController::class, 'detail'])->name('detailResult');
});
