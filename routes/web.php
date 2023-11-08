<?php

use App\Http\Controllers\CodeVerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InviteCodeController;
use App\Http\Controllers\InviteUserController;
use App\Http\Controllers\UnitsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect(route('login'));
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('units', UnitsController::class)->only('store', 'update', 'destroy');
});
Route::post('/check-code', [CodeVerificationController::class, 'verify'])->name('check-code');
Route::resource('codes', InviteCodeController::class)->middleware('admin')->name('create', 'createcode')->name('store', 'storecode');