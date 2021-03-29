<?php

use App\Http\Controllers\CondominiumController;
use App\Models\Condominium;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/condominio', [CondominiumController::class, 'index'])->middleware('auth')->name('condominium.index');
Route::get('/condominio/novo', [CondominiumController::class, 'create'])->middleware('auth')->name('condominium.create');
Route::post('/condominio', [CondominiumController::class, 'store'])->middleware('auth')->name('condominium.store');
Route::get('/condominio/{condominium}', [CondominiumController::class, 'show'])->middleware('auth')->name('condominium.show');
Route::put('/condominio/{condominium}', [CondominiumController::class, 'update'])->middleware('auth')->name('condominium.update');
Route::delete('/condominio/{condominium}', [CondominiumController::class, 'destroy'])->middleware('auth')->name('condominium.destroy');
require __DIR__.'/auth.php';
