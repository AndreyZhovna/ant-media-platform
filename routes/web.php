<?php

use App\Http\Controllers\StreamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Streams
Route::group(['prefix' => 'stream', 'as' => 'stream.'], static function () {
    Route::get('/index', [StreamController::class, 'index'])->name('index');
    Route::get('/view/{stream}', [StreamController::class, 'view'])->name('view');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/add', [StreamController::class, 'add'])->name('add');
        Route::post('/add', [StreamController::class, 'add'])->name('add');
    });
});
