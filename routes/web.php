<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/submit-login', [AuthController::class, 'SubmitLogin'])->name('submit.login');
Route::get('/Rigester', [AuthController::class, 'Rigester'])->name('register');
Route::post('/Submit-Rigester', [AuthController::class, 'SubmitRigester'])->name('submit.rigester');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/update-information', [ProfileController::class, 'updateProfile'])->name('update.info');
Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
Route::post('/update-image', [ProfileController::class, 'updateImage'])->name('update.image');
Route::post('/delete-profile', [ProfileController::class, 'deleteProfile'])->name('delete.profile');
