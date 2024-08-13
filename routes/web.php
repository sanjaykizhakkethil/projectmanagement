<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeEntryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/project-active/{id}', [ProjectController::class, 'activateProject'])->name('project-active');
Route::post('/task-active/{id}', [TaskController::class, 'activateTask'])->name('task-active');


Route::resource('project', ProjectController::class);
Route::resource('task', TaskController::class);
Route::resource('time', TimeEntryController::class);


Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/filter', 'ReportController@filter')->name('report.filter');



Route::get('/projects/{id}/hours', [ProjectController::class, 'getProjectHours']);

