<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\LoginController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', fn() => view('pages.welcome'));

Route::get('/account', fn() => view('pages.account'))->middleware('auth');

Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('/content', ContentController::class)->middleware('auth')->except(['index', 'show']);
Route::get('/content', fn() => view('pages.content', ['datas' => Article::orderBy('created_at', 'DESC')->get()]));
Route::get('/content/{id}', fn($id) => view('pages.showContent', ['data' => Article::where('id', $id)->first()]));

Route::get('/mycontent', fn() => view('pages.myContent', ['datas' => Article::where('author_id', Auth::user()->id)->latest()->get()]));
