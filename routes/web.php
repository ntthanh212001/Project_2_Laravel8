<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminMenuController;
use App\Http\Controllers\admin\GiangvienController;
use App\Http\Controllers\admin\GiangVienLoginController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\Logincontroller;
use App\Http\Controllers\admin\NganhController;
use App\Models\Admin;
use App\Models\Nganh;

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
// Route::get('/all-branch', function () {
//     return view('admin.branch.index', ['posts' => Nganh::all()])->name('branch');
// });
Route::get('admin/branch/', [AdminController::class, 'allBranch']);
Route::post('admin/branch/add-branch', [AdminController::class, 'addBranch'])->name('branch.add');
//
/* //admin - student
Route::get('/allstudent', [AdminController::class, 'AllStudent'])->name('student');
//student
//admin - class
Route::get('/all-class', [AdminController::class, 'AllClass'])->name('admin.class');
//class */

/* Admin-Teacher */
Route::get('/admin/teacher/', [AdminController::class, 'allTeacher']);
Route::post('/admin/teacher/add-teacher', [AdminController::class, 'addTeacher'])->name('teacher.add');
Route::get('/admin/teacher/{id}', [AdminController::class, 'getTeacherById']);


Route::put('/admin/teacher', [AdminController::class, 'updateTeacher'])->name('teacher.update');
Route::get('/admin/teacher/view/{id}', [AdminController::class, 'viewTeacherById'])->name('teacher.view');
// admin-Student
Route::get('/admin/student/', [AdminController::class, 'allStudent']);

// end student
//Admin-Class
Route::get('/admin/class/', [AdminController::class, 'AllClass']);
Route::post('/admin/class/add-class', [AdminController::class, 'addClass'])->name('class.add');
//end-Class
