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
})->name('welcome');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/search', [InputAspirasiController::class, 'search'])->name('search');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('kategori', KategoriController::class);

    Route::get('/inputaspirasi', [InputAspirasiController::class, 'index'])->name('inputaspirasi.index');
    Route::get('inputaspirasi/{id}', [InputAspirasiController::class, 'show'])->name('inputaspirasi.show');

    Route::get('/aspirasi/{id}/create', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/{id}', [AspirasiController::class, 'store'])->name('aspirasi.store');

    Route::get('/cetak', [InputAspirasiController::class, 'cetak'])->name('cetak');
});

Route::post('/inputaspirasi/store', [InputAspirasiController::class, 'store'])->name('inputaspirasi.store');

