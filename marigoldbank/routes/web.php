<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController as A;


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

Route::get('/home' , [A::class, 'home']);
Route::get('/login' , [A::class, 'login']);

//accounts
Route::get('/registerClient' , [A::class, 'create'])->name('accounts_create')->middleware('role:user');

Route::get('/clients' , [A::class, 'index'])->name('accounts_index')->middleware('role:user');
Route::post('/clients', [A::class, 'store'])->name('accounts_store')->middleware('role:user');

Route::get('/clients/{account}', [A::class, 'edit'])->name('accounts_add')->middleware('role:user');
Route::put('/clients/{account}' , [A::class, 'update'])->name('accounts_update')->middleware('role:user');
Route::delete('/clients/{account}' , [A::class, 'destroy'])->name('accounts_delete')->middleware('role:admin');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
