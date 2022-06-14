<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/messages', function () {
    return view('dashboard');
})->middleware(['auth'])->name('messages');

Route::get('/users', [UserController::class, 'index'])->middleware(['auth'])->name('users');

Route::get('/profile', [UserController::class, 'edit'])->middleware(['auth'])->name('profile');

Route::post('/profile', [UserController::class, 'update'])->middleware(['auth'])->name('updateProfile');

Route::get('/adminEdit/{id}', [UserController::class, 'adminEdit'])->middleware(['auth'])->name('adminEdit');

Route::post('/editUser', [UserController::class, 'editUser'])->middleware(['auth'])->name('editUser');

Route::get('/deleteUser/{id}', [UserController::class, 'destroy'])->middleware(['auth'])->name('deleteUser');

Route::get('/changeStatus/{id}', [UserController::class, 'changeStatus'])->middleware(['auth'])->name('changeStatus');

Route::get('/courses', [CourseController::class, 'index'])->middleware(['auth'])->name('courses');

Route::get('/editCourse/{id}', [CourseController::class, 'edit'])->middleware(['auth'])->name('editCourse');

Route::post('/updateCourse', [CourseController::class, 'update'])->middleware(['auth'])->name('updateCourse');

Route::get('/deleteCourse/{id}', [CourseController::class, 'destroy'])->middleware(['auth'])->name('deleteCourse');

Route::get('/participantes/{id}', [CourseController::class, 'participantes'])->middleware(['auth'])->name('participantes');

Route::get('/createCurso', [CourseController::class, 'create'])->middleware(['auth'])->name('createCourse');

require __DIR__.'/auth.php';
