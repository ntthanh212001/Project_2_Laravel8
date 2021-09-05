<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminMenuController;
use App\Http\Controllers\admin\GiangvienController;
use App\Http\Controllers\admin\GiangVienLoginController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\Logincontroller;

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
//user
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/login', [Logincontroller::class, 'FormLogin'])->name('login');
Route::post('/login', [Logincontroller::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//
//admin
Route::get('admin/', [AdminController::class, 'index'])->name('admin.home');
Route::get('admin/login', [AdminLoginController::class, 'AdminFormLogin'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
//endadmin
//giangvien
Route::get('giangvien/', [GiangvienController::class, 'index'])->name('giangvien.home');
Route::get('giangvien/login', [GiangVienLoginController::class, 'GiangvienFormLogin'])->name('giangvien.login');
Route::post('giangvien/login', [GiangVienLoginController::class, 'login']);
Route::get('giangvien/logout', [GiangVienLoginController::class, 'logout'])->name('giangvien.logout');
//
//admin - branch
Route::get('/all-branch', [AdminController::class, 'AllBranch'])->name('branch');
Route::get('/insert-branch', [AdminController::class, 'FormInsertBranch'])->name('form-insert-branch');
Route::post('/insert-branch', [AdminController::class, 'insertbranch'])->name('insert.branch');

Route::get('/delete-branch/{id}', [AdminController::class, 'deletebranch'])->name('delete-branch');
Route::get('/edit-branch/{id}', [AdminController::class, 'FormEditBranch'])->name('edit-branch');
Route::post('/edit-branch/{id}', [AdminController::class, 'EditBranchtbranch']);
//
//admin - student
Route::get('/allstudent', [AdminController::class, 'AllStudent'])->name('student');
//student
//admin - class
Route::get('/all-class', [AdminController::class, 'AllClass'])->name('admin.class');
//class

