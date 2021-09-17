<?php

/** @noinspection ALL */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController};
use App\Http\Controllers\admin\AdminLoginController;

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

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/login', [AdminLoginController::class, 'AdminFormLogin'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/branch/', [AdminController::class, 'allBranch'])->name('branch');
    Route::post('/branch/add-branch', [AdminController::class, 'addBranch'])->name('branch.add');
    Route::get('/teacher/dev', [AdminController::class, 'allTeacher'])->name('teacher.dev');
    Route::post('/teacher/add-teacher', [AdminController::class, 'addTeacher'])->name('teacher.add');
    Route::get('/teacher/{id}', [AdminController::class, 'getTeacherById']);


    Route::put('/teacher', [AdminController::class, 'updateTeacher'])->name('teacher.update');
    Route::get('/teacher/view/{id}', [AdminController::class, 'viewTeacherById'])->name('teacher.view');
    // admin-Student
    Route::get('/student/', [AdminController::class, 'allStudent'])->name('student');

    Route::get('/student/dev', [AdminController::class, 'studenDev'])->name('student.dev');
    Route::get('/student/qtht', [AdminController::class, 'studenQtht'])->name('student.qtht');
    Route::get('/student/tkdh', [AdminController::class, 'studenTkdh'])->name('student.tkdh');

    Route::get('/student/add-student-Form', [AdminController::class, 'showFormStudent'])->name('student.showForm');
    Route::post('/student/add-student', [AdminController::class, 'addStudent'])->name('student.add');
    Route::get('/student/edit/{id}', [AdminController::class, 'ShowDataStudent'])->name('student.showFormUpdate');

    Route::post('/student/update/', [AdminController::class, 'updateStudent'])->name('student.update');
    Route::get('/student/view/{id}', [AdminController::class, 'viewTeacherById'])->name('student.view');

    Route::get('/exportSinhvien', [AdminController::class, 'exportSinhvien']);
    Route::get('/sampleSinhvien', [AdminController::class, 'sampleSinhvien']);
    Route::post('/importStudent', [AdminController::class, 'importSinhvien'])->name('importSinhvien');
    Route::get('/student/add-student-Form-Excel', [AdminController::class, 'showFormExcelStudent'])->name('student.showFormExcel');
    // end student
    //UPDATE STATUS
    Route::get('/status/update/{id}', [AdminController::class, 'statusUpdate']);
    //Admin-Class
    Route::get('/class/', [AdminController::class, 'AllClass'])->name('class');
    Route::post('/class/add-class', [AdminController::class, 'addClass'])->name('class.add');
    //end-Class
    //Admin-Class
    Route::get('/object/', [AdminController::class, 'allObject'])->name('object');
    Route::get('/object/add-object', [AdminController::class, 'addObject'])->name('object.add');
    //end-Class
    //Admin-Mark
    Route::get('/mark/', [AdminController::class, 'allMark'])->name('mark');
    Route::post('/mark/add-mark', [AdminController::class, 'addMark'])->name('mark.add');
    /* Route::get('/admin/mark/{id}', [AdminController::class, 'getMarkById']); */


    Route::get('/mark/dev', [AdminController::class, 'markDev'])->name('mark.dev');
    Route::get('/mark/qtht', [AdminController::class, 'markQtht'])->name('mark.qtht');
    Route::get('/mark/tkdh', [AdminController::class, 'markTkdh'])->name('mark.tkdh');
    Route::post('/mark/save', [AdminController::class, 'savediem'])->name('mark.savediem');
});


//endadmin
//giangvien
Route::get('giangvien/', [GiangvienController::class, 'index'])->name('giangvien.home');
Route::get('giangvien/login', [GiangVienLoginController::class, 'GiangvienFormLogin'])->name('giangvien.login');
Route::post('giangvien/login', [GiangVienLoginController::class, 'login']);
Route::get('giangvien/logout', [GiangVienLoginController::class, 'logout'])->name('giangvien.logout');
//
// });
//

/* Admin-Teacher */

/* Route::get('/admin/mark/view/{id}', [AdminController::class, 'viewMarkById'])->name('mark.view'); */
//end-point



//Giảng viên

Route::get('/giangvien/myclass/', [GiangvienController::class, 'ClassTeacherDev'])->name('teacher.class');
Route::get('/giangvien/mark/dev', [GiangvienController::class, 'TeacherMarkDev'])->name('teacher.markdev');


Route::get('/giangvien/myclass/', [GiangvienController::class, 'ClassTeacher'])->name('teacher.class');

