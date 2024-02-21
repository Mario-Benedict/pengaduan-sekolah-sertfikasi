<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InputAspirasiController;
use App\Http\Controllers\AspirasiController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('kategori', KategoriController::class);

    Route::get('/inputaspirasi', [InputAspirasiController::class, 'index'])->name('inputaspirasi.index');
    Route::get('inputaspirasi/{id}', [InputAspirasiController::class, 'show'])->name('inputaspirasi.show');

    Route::get('/aspirasi/{id}/create', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/{id}', [AspirasiController::class, 'store'])->name('aspirasi.store');
});

Route::post('/inputaspirasi/store', [InputAspirasiController::class, 'store'])->name('inputaspirasi.store');

