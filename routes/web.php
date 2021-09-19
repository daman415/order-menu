<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


Route::group(['middleware' => ['auth','cekRole:manager,pelayan']], function(){
    Route::get('/rekap', [PesananController::class,'rekap']);
});

Route::group(['middleware' => ['auth','cekRole:manager']], function(){
    Route::resource('/user', UserController::class);
    Route::resource('/menu', MenuController::class);
});

Route::group(['middleware' => ['auth','cekRole:pelayan']], function(){
    Route::get('/order', [PesananController::class,'create']);
});

Route::group(['middleware' => ['auth','cekRole:kasir,pelayan']], function(){
    Route::resource('/pesanan', PesananController::class);
});




