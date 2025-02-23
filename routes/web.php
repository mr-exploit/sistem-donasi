<?php

use App\Http\Controllers\AdminContreller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Filament\Pages\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Filament\Pages\Dashboard as PagesDashboard;

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
        Route::get('/dashboar', [AdminContreller::class, 'index'])->name('dashboar');
        Route::get('/admin', PagesDashboard::class)->name('filament.pages.dashboard');
        // Route::get('/admin', function () {
        //     return view('welcome'); // Ini bisa bentrok dengan route Filament
        // });
    }
);
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/program', [UserController::class, 'programView'])->name('program');
Route::get('/berita', [UserController::class, 'beritaView'])->name('berita');
Route::get('/donasi', [UserController::class, 'donasiPage'])->name('donasi');

// payment  path donasi 


Route::get('/berita/{slug}', [UserController::class, 'detailBerita'])->name('beritaDetail');

Route::get('/program/{slug}/payment', [TransactionController::class, 'detailProgramPayment'])->name('programDetailPayment');
Route::get('/program/{slug}', [UserController::class, 'detailProgram'])->name('programDetail');
Route::post('/program/{slug}/payment', [TransactionController::class, 'detailProgramPayment'])->name('programPayment');
Route::get('/payment/success/{transaction_id}', [TransactionController::class, 'paymentToSuccess'])->name('payment.success');
// login and register path
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth_login'])->name('createlogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create_user'])->name('createuser');

// konten statis
Route::get('/terms-and-condition', [UserController::class, 'TermsAndCondition'])->name('terms');
Route::get('/privacy-and-policy', [UserController::class, 'PrivacyPolicy'])->name('privacy');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
