<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DegreeMajorController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MajorSubjectController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGroupController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\CheckLoginMiddleware;
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

//Route::get('/', function () {
//    return view('layout.master');
//});

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'processLogin'])->name('process_login');

Route::middleware([CheckLoginMiddleware::class])->group(function (){

    Route::middleware(['middleware' => 'roles:admin'])->group(function (){
        
    });

    Route::middleware(['middleware' => 'roles:manager'])->group(function (){
         Route::group([
            'as' => 'curriculums.',
            'prefix' => 'curriculums'
        ], static function (){
            Route::post('/import-csv', [MajorSubjectController::class, 'importCsv'])->name('import_CSV');
        });

        Route::group([
            'as' => 'student_groups.',
            'prefix' => 'student_groups'
        ], static function (){
            Route::post('/import-csv', [StudentGroupController::class, 'importCsv'])->name('import_CSV');
        });

        Route::group([
            'as' => 'grades.',
            'prefix' => 'grades'
        ], static function (){
            Route::get('/import-grade', [GradeController::class, 'importGrade'])->name('import_Grade');
            Route::post('/store-grade', [GradeController::class, 'storeCSV'])->name('store_csv');
        });

    });

    Route::middleware(['middleware' => 'roles:admin,manager'])->group(function (){

        Route::group([
            'as' => 'subjects.',
            'prefix' => 'subjects'
        ], static function (){
            Route::get('/', [SubjectController::class, 'index'])->name('index');
            Route::get('/create', [SubjectController::class, 'create'])->name('create');
            Route::post('/create', [SubjectController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'degrees.',
            'prefix' => 'degrees'
        ], static function (){
            Route::get('/', [DegreeController::class, 'index'])->name('index');
            Route::get('/create', [DegreeController::class, 'create'])->name('create');
            Route::post('/create', [DegreeController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'majors.',
            'prefix' => 'majors'
        ], static function (){
            Route::get('/', [MajorController::class, 'index'])->name('index');
            Route::get('/create', [MajorController::class, 'create'])->name('create');
            Route::post('/create', [MajorController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'students.',
            'prefix' => 'students'
        ], static function (){
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
            Route::post('/create', [StudentController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'groups.',
            'prefix' => 'groups'
        ], static function (){
            Route::get('/', [GroupController::class, 'index'])->name('index');
            Route::get('/create', [GroupController::class, 'create'])->name('create');
            Route::post('/create', [GroupController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'managers.',
            'prefix' => 'managers'
        ], static function (){
            Route::get('/', [ManagerController::class, 'index'])->name('index');
            Route::get('/create', [ManagerController::class, 'create'])->name('create');
            Route::post('/create', [ManagerController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'admins.',
            'prefix' => 'admins'
        ], static function (){
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::post('/create', [AdminController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'degree_majors.',
            'prefix' => 'degree_majors'
        ], static function (){
            Route::get('/', [DegreeMajorController::class, 'index'])->name('index');
            Route::get('/create', [DegreeMajorController::class, 'create'])->name('create');
            Route::post('/create', [DegreeMajorController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'curriculums.',
            'prefix' => 'curriculums'
        ], static function (){
            Route::get('/', [MajorSubjectController::class, 'index'])->name('index');
            Route::get('/show/{majorSubject}', [MajorSubjectController::class, 'show'])->name('show');
            Route::post('/create', [MajorSubjectController::class, 'store'])->name('store');
        });

        Route::group([
            'as' => 'student_groups.',
            'prefix' => 'student_groups'
        ], static function (){
            Route::get('/', [StudentGroupController::class, 'index'])->name('index');
            Route::post('/filter', [StudentGroupController::class, 'apiFilter'])->name('api_Filter');
        });

        Route::group([
            'as' => 'grades.',
            'prefix' => 'grades'
        ], static function (){
            Route::get('/', [GradeController::class, 'index'])->name('index');
            Route::post('/filter', [GradeController::class, 'apiFilter'])->name('api_Filter');
            Route::get('/student-grade/{id}', [GradeController::class, 'viewStudentGrade'])->name('student_grade');
        });

    });


    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/', [HomeController::class, 'welcome'])->name('home');

    Route::group([
        'as' => 'grades.',
        'prefix' => 'grades'
    ], static function (){
        Route::get('/student-grade/{id}', [GradeController::class, 'viewStudentGrade'])->name('student_grade');
    });


    Route::group([
        'as' => 'students.',
        'prefix' => 'students'
    ], static function (){
        Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
    });

});






//Route::get('/abc/{id}',[ManagerController::class,'abc'])->name('abc');

