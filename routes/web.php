<?php

use App\Http\Controllers\SignInController;
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

Route::get('/', [SignInController::class, 'index']);
Route::get('/sign-fetch', [SignInController::class, 'fetch'])->name('signIn.fetch');
Route::post('/sign-create', [SignInController::class, 'create'])->name('signIn.create');
Route::post('/sign-delete', [SignInController::class, 'delete'])->name('signIn.delete');
Route::post('/sign-update', [SignInController::class, 'update'])->name('signIn.update');
Route::get('/sign-get', [SignInController::class, 'getById'])->name('signIn.get');
