<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\MajorController;
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

Route::get('/', function () {
    return view('layout.master');
});



Route::resource('subjects', SubjectController::class)->except([
    'show'
]);

Route::resource('degrees', DegreeController::class)->except([
    'show'
]);

Route::resource('majors',MajorController::class)->except([
   'show'
]);

Route::resource('students', StudentController::class)->except([
   'show'
]);


