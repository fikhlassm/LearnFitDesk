<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\KelasController;

// Landing page (halaman utama sebelum login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Register
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Welcome page setelah login/register berhasil
Route::get('/welcome', function () {
    return view('auth.welcome-after');
})->middleware('auth')->name('welcome');

// Quiz routes (siswa only)
Route::middleware('auth')->group(function () {
    Route::get('/quiz', [QuizController::class, 'show'])->name('quiz');
    Route::post('/quiz', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/hasil', [QuizController::class, 'result'])->name('quiz.result');
    Route::get('/quiz/ulang', [QuizController::class, 'retake'])->name('quiz.retake');
});

// Dashboard Pengajar
Route::get('/dashboard/pengajar', function () {
    return view('dashboard.pengajar');
})->middleware('auth')->name('dashboard.pengajar');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/kelas',          [KelasController::class, 'index'])->name('dashboard.kelas');
    Route::post('/dashboard/kelas',         [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/dashboard/kelas/{id}',     [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/dashboard/kelas/{id}',     [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/dashboard/kelas/{id}',  [KelasController::class, 'destroy'])->name('kelas.destroy');
});

// Dashboard Siswa
Route::get('/dashboard/siswa', function () {
    return view('dashboard.siswa');
})->middleware('auth')->name('dashboard.siswa');


Route::get('/tentang', function () {
    return view('about');
})->name('about');

Route::get('/kontak', function () {
    return view('contact');
})->name('contact');
