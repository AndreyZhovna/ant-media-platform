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

Route::get('/', static function () {
    return redirect( \route('stream.index') );
});

Auth::routes();

// Streams
Route::group(['prefix' => 'stream', 'as' => 'stream.'], static function () {
    Route::get('/index', [StreamController::class, 'index'])->name('index');
    Route::get('/view/{stream:slug}', [StreamController::class, 'view'])->name('view');

    Route::get('/test', [StreamController::class, 'test'])->name('test');


    Route::group(['middleware' => 'auth'], static function () {
        Route::get('/add', [StreamController::class, 'add'])->name('add');
        Route::post('/add', [StreamController::class, 'store'])->name('add.post');
    });
});
