<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\Controle;

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

Route::post('/login',function () {return view('cadastro'); });
Route::get('/auth/github/redirect',[authcontroller::class, 'githubredirect'])->name('social.git');
Route::get('/auth/github/callback',[authcontroller::class, 'githubcallback'])->name('social.git.call');
Route::get('/cadastrar', function () {return view('cadastro'); })->name('social.envio');
Route::post('/cadastro', [Controle::class, 'cadastro']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
