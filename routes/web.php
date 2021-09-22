<?php /** @noinspection ALL */

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
//endadmin
//giangvien
Route::get('giangvien/', [GiangvienController::class, 'index'])->name('giangvien.home');
Route::get('giangvien/login', [GiangVienLoginController::class, 'GiangvienFormLogin'])->name('giangvien.login');
Route::post('giangvien/login', [GiangVienLoginController::class, 'login']);
Route::get('giangvien/logout', [GiangVienLoginController::class, 'logout'])->name('giangvien.logout');
//
// });
Route::get('admin/branch/', [AdminController::class, 'allBranch'])->name('branch');
Route::post('admin/branch/add-branch', [AdminController::class, 'addBranch'])->name('branch.add');
//

/* Admin-Teacher */
Route::get('/admin/teacher/', [AdminController::class, 'allTeacher'])->name('teacher');
Route::post('/admin/teacher/add-teacher', [AdminController::class, 'addTeacher'])->name('teacher.add');
Route::get('/admin/teacher/{id}', [AdminController::class, 'getTeacherById']);


Route::put('/admin/teacher', [AdminController::class, 'updateTeacher'])->name('teacher.update');
Route::get('/admin/teacher/view/{id}', [AdminController::class, 'viewTeacherById'])->name('teacher.view');
// admin-Student
Route::get('/admin/student/', [AdminController::class, 'allStudent'])->name('student');

Route::get('/admin/student/dev', [AdminController::class, 'studenDev'])->name('student.dev');
Route::get('/admin/student/qtht', [AdminController::class, 'studenQtht'])->name('student.qtht');
Route::get('/admin/student/tkdh', [AdminController::class, 'studenTkdh'])->name('student.tkdh');

Route::get('/admin/student/add-student-Form', [AdminController::class, 'showFormStudent'])->name('student.showForm');
Route::post('/admin/student/add-student', [AdminController::class, 'addStudent'])->name('student.add');
Route::get('/admin/student/edit/{id}', [AdminController::class, 'ShowDataStudent'])->name('student.showFormUpdate');

Route::post('/admin/student/update/', [AdminController::class, 'updateStudent'])->name('student.update');
Route::get('/admin/student/view/{id}', [AdminController::class, 'viewTeacherById'])->name('student.view');


Route::get('/exportSinhvien',[AdminController::class,'exportSinhvien']);
Route::get('/sampleSinhvien',[AdminController::class,'sampleSinhvien']);
Route::post('/importStudent',[AdminController::class,'importSinhvien'])->name('importSinhvien');
Route::get('/admin/student/add-student-Form-Excel', [AdminController::class, 'showFormExcelStudent'])->name('student.showFormExcel');
// end student
//UPDATE STATUS
Route::get('/status/update/{id}', [AdminController::class, 'statusUpdate']);
//Admin-Class
Route::get('/admin/class/', [AdminController::class, 'AllClass'])->name('class');
Route::post('/admin/class/add-class', [AdminController::class, 'addClass'])->name('class.add');
//end-Class
//Admin-Class
Route::get('/admin/object/', [AdminController::class, 'allObject'])->name('object');
Route::get('/admin/object/add-object', [AdminController::class, 'addObject'])->name('object.add');
//end-Class
//Admin-Mark
Route::get('/admin/mark/', [AdminController::class, 'allMark'])->name('mark');
Route::post('/admin/mark/add-mark', [AdminController::class, 'addMark'])->name('mark.add');
/* Route::get('/admin/mark/{id}', [AdminController::class, 'getMarkById']); */


Route::GET('/admin/mark/dev', [AdminController::class, 'markDev'])->name('mark.dev');
Route::get('/admin/mark/qtht', [AdminController::class, 'markQtht'])->name('mark.qtht');
Route::get('/admin/mark/tkdh', [AdminController::class, 'markTkdh'])->name('mark.tkdh');
Route::post('/admin/mark/save',[AdminController::class, 'savediem'])->name('mark.savediem');
/* Route::get('/admin/mark/view/{id}', [AdminController::class, 'viewMarkById'])->name('mark.view'); */
//end-point



//Giảng viên
Route::get('/giangvien/myclass/', [GiangvienController::class, 'ClassTeacherDev'])->name('teacher.class');
Route::get('/giangvien/mark/dev', [GiangvienController::class, 'TeacherMarkDev'])->name('teacher.markdev');
Route::get('/giangvien/markFloject', [GiangvienController::class, 'TeachermarkFloject'])->name('teacher.markfloject');

