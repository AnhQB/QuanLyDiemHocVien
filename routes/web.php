<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DegreeMajorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MajorSubjectController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Degree;
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



Route::resource('subjects', SubjectController::class)->except([
    'show'
]);

Route::resource('degrees', DegreeController::class)->except([
    'show'
]);

Route::resource('majors',MajorController::class)->except([
   'show'
]);

Route::resource('students', StudentController::class);

Route::resource('groups', GroupController::class)->except([
    'show'
]);
Route::resource('managers', ManagerController::class)->except([
    'show'
]);
Route::resource('admins', AdminController::class)->except([
    'show'
]);
Route::resource('degree_majors', DegreeMajorController::class)->except([
    'show'
]);
Route::resource('curriculums', MajorSubjectController::class);

Route::get('/', [DashboardController::class, 'index'])->name('dashboards');



//Route::get('/abc/{id}',[ManagerController::class,'abc'])->name('abc');

