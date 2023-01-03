<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

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

Route::get('dashboard',[StudentController::class,'dashboard'])->name('dashboard');
Route::get('student/register',[StudentController::class,'studentRegister'])->name('student.register');
Route::get('student/login/form',[StudentController::class,'studentLoginForm'])->name('student.login.form');
Route::post('student/login/submit',[StudentController::class,'studentLoginSubmit'])->name('student.login.submit');