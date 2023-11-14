<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PublishingController;
use App\Http\Controllers\AuthorizationController;

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

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('publishing/instant', [PublishingController::class, 'instant'])->name('publishing.instant')->middleware('auth');
Route::get('publishing/queued', [PublishingController::class, 'queued'])->middleware('auth');
Route::get('publishing/scheduled', [PublishingController::class, 'scheduled'])->middleware('auth');

Route::get('authorization/twitter', [AuthorizationController::class, 'twitter'])->name('authorization.twitter')->middleware('auth');
Route::get('authorization/reddit', [AuthorizationController::class, 'reddit'])->middleware('auth');
Route::get('authorization/pinterest', [AuthorizationController::class, 'pinterest'])->middleware('auth');