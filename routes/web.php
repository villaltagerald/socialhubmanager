<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConsentsController;
use App\Http\Controllers\QueuingScheduleController;
use App\Http\Controllers\MastodonController;
use App\Http\Controllers\RedditController;
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

Route::get('publishing/instant', [PostController::class, 'instant'])->name('publishing.instant')->middleware('auth');
Route::get('publishing/queued', [PostController::class, 'queued'])->middleware('auth');
Route::get('publishing/scheduled', [PostController::class, 'scheduled'])->middleware('auth');

Route::post('publishing/instant', [PostController::class, 'store'])->name('instant.store')->middleware('auth');
Route::post('publishing/queued', [PostController::class, 'store'])->name('queued.store')->middleware('auth');
Route::post('publishing/scheduled', [PostController::class, 'store'])->name('scheduled.store')->middleware('auth');

Route::get('publishing/queuingschedule', [QueuingScheduleController::class, 'create'])->name('queuingschedule.create')->middleware('auth');
Route::post('publishing/queuingschedule', [QueuingScheduleController::class, 'store'])->name('queuingschedule.store')->middleware('auth');
Route::delete('publishing/queuingschedule/{queuingschedule}', [QueuingScheduleController::class, 'destroy'])->name('queuingschedule.destroy')->middleware('auth');


Route::get('authorization/twitter', [ConsentsController::class, 'twitter'])->name('authorization.twitter.twitter')->middleware('auth');
Route::post('authorization/twitter', [ConsentsController::class, 'store'])->name('authorization.twitter.store')->middleware('auth');
Route::patch('authorization/twitter/{consent}', [ConsentsController::class, 'update'])->name('authorization.twitter.update')->middleware('auth');
Route::delete('authorization/twitter/{consent}', [ConsentsController::class, 'destroy'])->name('authorization.twitter.destroy')->middleware('auth');

Route::get('authorization/mastodon', [ConsentsController::class, 'mastodon'])->name('authorization.mastodon.mastodon')->middleware('auth');
Route::post('authorization/mastodon', [ConsentsController::class, 'store'])->name('authorization.mastodon.store')->middleware('auth');
Route::patch('authorization/mastodon/{consent}', [ConsentsController::class, 'update'])->name('authorization.mastodon.update')->middleware('auth');
Route::delete('authorization/mastodon/{consent}', [ConsentsController::class, 'destroy'])->name('authorization.mastodon.destroy')->middleware('auth');

Route::get('authorization/reddit', [ConsentsController::class, 'reddit'])->name('authorization.reddit.reddit')->middleware('auth');
Route::post('authorization/reddit', [ConsentsController::class, 'store'])->name('authorization.reddit.store')->middleware('auth');
Route::patch('authorization/reddit/{consent}', [ConsentsController::class, 'update'])->name('authorization.reddit.update')->middleware('auth');
Route::delete('authorization/reddit/{consent}', [ConsentsController::class, 'destroy'])->name('authorization.reddit.destroy')->middleware('auth');


Route::post('auth/reddit', [RedditController::class, 'redirectToReddit'])->name('auth.reddit')->middleware('auth');
Route::get('auth/reddit/callback', [RedditController::class, 'handleRedditCallback'])->name('auth.reddit.callback')->middleware('auth');

