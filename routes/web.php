<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('home');
})->name('home');

Route::get('/about_us', function () {
    return view('about');
})->name('about');

Route::get('/posts.create', function () {
    return view('create');
})->name('posts.create');

Route::post('/posts', function(Request $request) {
    $request->validate([
        'title' => 'required',
        'description' => 'required|min:10'
    ]);
    return redirect()
            ->route('posts.create')
            ->with('success', 'Post created successfully!!'); /*Title: ' .*/
//            $request->input('title') . 'Description: ' .
//            $request->input('description'));
})->name('posts.store');
