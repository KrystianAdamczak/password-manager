<?php
namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;

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
    return view('auth/login');
});
Route::get('/showPassword',[PasswordController::class,'showPassword'])->name('password.showPassword');



Auth::routes();
Route::get('/index',[PasswordController::class,'index']);
Route::post('/addPassword',[PasswordController::class,'addPassword'])->name('password.add');
Route::get('/destroy/{id}', [PasswordController::class, 'destroy'])
    ->name('password.destroy')->middleware(['auth', 'password.confirm']);
Route::get('/edit', [PasswordController::class, 'edit'])
    ->name('password.edit')->middleware(['auth', 'password.confirm']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
