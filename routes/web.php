<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Middleware\AdminMiddleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/indexAdmin', [LoginController::class, 'indexAdmin'])->name('indexAdmin');
});
// Auth
Route::get('/loginAdmin', [LoginController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/loginAdmin', [LoginController::class, 'postLoginAdmin'])->name('postLoginAdmin');
Route::get('/registerAdmin', [LoginController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('/registerAdmin', [LoginController::class, 'postRegisterAdmin'])->name('postRegisterAdmin');
Route::get('/logoutAdmin', [LoginController::class, 'logoutAdmin'])->name('logoutAdmin');
//active
Route::get('/active/{id}', [LoginController::class, 'active'])->name('active');
//
// Route::get('/user/{user}/activate', [LoginController::class, 'activate'])->name('user.activate');
// Route::get('/user/{user}/deactivate', [LoginController::class, 'deactivate'])->name('user.deactivate');

// Clients
Route::get('/indexClient', [ClientController::class, 'indexClient'])->name('indexClient');
Route::get('/loginClient', [ClientController::class, 'loginClient'])->name('loginClient');
Route::post('/loginClient', [ClientController::class, 'postLoginClient'])->name('postLoginClient');
Route::get('/logoutClient', [ClientController::class, 'logoutClient'])->name('logoutClient');
Route::post('/updateClient/{id}', [ClientController::class, 'updateClient'])->name('updateClient');
// password
Route::get('/editPassword/{id}', [ClientController::class, 'editPassword'])->name('editPassword');
Route::post('/editPassword/{id}', [ClientController::class, 'updatePassword'])->name('updatePassword');


