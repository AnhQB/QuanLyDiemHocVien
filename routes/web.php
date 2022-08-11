<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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
    return view('home');
});

Route::resources([
    'subjects' => SubjectController::class,
    'degrees' => DegreeController::class,
    'majors' => MajorController::class,
    'students' => StudentController::class,
    'groups' => GroupController::class,
    'managers' => ManagerController::class,
    'admins' => AdminController::class,
], [
    'except' => ['show'],
]);

//Route::get('/abc/{id}',[ManagerController::class,'abc'])->name('abc');
