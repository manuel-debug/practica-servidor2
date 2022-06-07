<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/courses', function () {
    return view('dashboard');
})->middleware(['auth'])->name('courses');

Route::get('/messages', function () {
    return view('dashboard');
})->middleware(['auth'])->name('messages');

Route::get('/users',[UserController::class,'index'])->middleware(['auth'])->name('users');

Route::get('/profile',[UserController::class,'edit'])->middleware(['auth'])->name('profile');

Route::post('/profile',[UserController::class,'update'])->middleware(['auth'])->name('updateProfile');

Route::get('/adminEdit/{id}',[UserController::class,'adminEdit'])->middleware(['auth'])->name('adminEdit');

Route::post('/editUser',[UserController::class,'editUser'])->middleware(['auth'])->name('editUser');

Route::get('/deleteUser/{id}',[UserController::class,'destroy'])->middleware(['auth'])->name('deleteUser');

Route::get('/changeStatus/{id}',[UserController::class,'changeStatus'])->middleware(['auth'])->name('changeStatus');

require __DIR__.'/auth.php';
