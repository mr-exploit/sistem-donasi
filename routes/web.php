<?php

use App\Http\Controllers\AdminContreller;
use App\Http\Controllers\UserController;
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

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/dashboard', [AdminContreller::class, 'index'])->name('dashboard');
    }
);
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/program', [UserController::class, 'programView'])->name('program');
Route::get('/berita', [UserController::class, 'beritaView'])->name('berita');

// Route::get('/', function () {
//     return view('welcome');
// }

// );
