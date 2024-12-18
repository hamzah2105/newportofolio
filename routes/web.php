<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\depanController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\riwayatController;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\pengaturanhalamanController;

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

route::get('/', [depanController::class, 'index'])->name('frontend.index');
route::get('detail/{id}', [depanController::class, 'detail'])->name('frontend.detail');

Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);




Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/', [halamanController::class, 'index']);
        Route::resource('halaman', halamanController::class);
        Route::resource('riwayat', riwayatController::class);
        Route::resource('portofolio', portofolioController::class);
        route::get('skill', [skillController::class, "index"])->name('skill.index');
        route::post('skill', [SkillController::class, "update"])->name('skill.update');
        route::get('profil', [profilController::class, "index"])->name('profil.index');
        route::post('profil', [profilController::class, "update"])->name('profil.update');
        route::get('pengaturanhalaman', [pengaturanhalamanController::class, "index"])
        ->name('pengaturanhalaman.index');
        route::post('pengaturanhalaman', [pengaturanhalamanController::class, "update"])
        ->name('pengaturanhalaman.update');
    }
);
