<?php
namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\HomeController;

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


Auth::routes();
Route::get('/index',[PasswordController::class,'index']);
Route::post('/addPassword',[PasswordController::class,'addPassword'])->name('password.add');
Route::get('/destroy/{id}', [PasswordController::class, 'destroy'])
    ->name('password.destroy');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
