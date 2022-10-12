<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about_us', [HomeController::class, 'about'])->name('about');

Route::resource('posts', PostController::class)->except(['index']);

//Route::name('posts.')->prefix('posts')->group(function () {
//    Route::get('/create', function () {
//    })->name('create');
//
//    Route::post('/', function(Request $request) {
//
//    })->name('store');
//
//});

