<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
	
	Route::resource('/student',StudentController::class);
	Route::post("student/{student}/restore",[StudentController::class,"restore"])->name("student.restore");
	
	Route::resource('/program',ProgramController::class);
	Route::post("program/{program}/restore",[ProgramController::class,"restore"])->name("program.restore");
	
	Route::resource('/course',CourseController::class);
	Route::post("course/{course}/restore",[CourseController::class,"restore"])->name("course.restore");
	
});
