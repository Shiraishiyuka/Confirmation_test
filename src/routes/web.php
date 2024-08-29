<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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


Route::get('/',[ContactController::class, 'index']);
Route::post('/confirm',[ContactController::class, 'confirm']);
Route::get('/thanks',[ContactController::class, 'create'])->name('thanks.show');
Route::post('/thanks',[ContactController::class, 'create'])->name('thanks.show');

Route::group(['middleware' => ['auth']], function () {
    Route::match(['get', 'post'], '/admin', [ContactController::class, 'admin'])->name('admin');
    Route::get('/admin/{id}', [ContactController::class, 'show'])->name('admin.show');
    Route::delete('/admin/{id}', [ContactController::class, 'delete'])->name('admin.destroy');
    Route::post('/admin/export', [ContactController::class, 'export'])->name('admin.export');
});

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');


