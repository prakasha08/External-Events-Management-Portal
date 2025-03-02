<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\Events_request;
use App\Http\Controllers\faculty;
use App\Http\Controllers\ira;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/events_req',[Events_request::class,'index'])->name('events_req.index');
Route::get('/student/events_req/create',[Events_request::class,'create'])->name('events_req.create');
Route::get('/students/{id}', [Events_request::class, 'getStudentDetails']);
Route::post('/student/events_req/store',[Events_request::class,'store'])->name('events_req.store');
Route::get('/student/events_req/{event_name}', [Events_request::class, 'show'])->name('events_req.show');
Route::get('/student/eventsList', [Events_request::class, 'events_index'])->name('eventsList.index');
Route::get('/student/eventsList/{event}', [Events_request::class, 'events_show'])->name('eventsList.show');
Route::get('/admin/events_req',[admin::class,'eventsReq_index'])->name('admin_events_req.index');
Route::get('/admin/events_req/{id}/evaluate', [admin::class, 'evaluate'])->name('events_req.evaluate');
Route::post('/admin/events_req/{id}/evaluate', [admin::class, 'storeEvaluation'])->name('events_req.storeEvaluation');
Route::get('/student/ira', [ira::class, 'ira_index'])->name('ira.index');
Route::get('/student/ira/create', [ira::class, 'ira_create'])->name('ira.create');
Route::get('/students/{id}', [ira::class, 'StudentDetails']);
Route::post('/student/ira/store', [ira::class, 'ira_store'])->name('ira.store');
Route::get('/ira/{event}', [ira::class, 'ira_show'])->name('ira.show');

Route::get('/admin/eventsList', [admin::class, 'events_index'])->name('admin_events_List.index');
Route::get('/admin/eventsList/create',[admin::class,'events_create'])->name('admin_events_List.create');
Route::post('/admin/eventsList/store',[admin::class,'events_store'])->name('admin_events_List.store');
Route::get('/admin/eventsList/{event}', [admin::class, 'events_show'])->name('admin_events_List.show');
Route::get('/admin/eventsList/{event}/edit',[admin::class,'events_edit'])->name('admin_events_List.edit');
Route::put('/admin/eventsList/{event}', [admin::class, 'events_update'])->name('admin_events_List.update');
Route::delete('/admin/eventsList/{event}',[admin::class,'events_destroy'])->name('admin_events_List.delete');
Route::get('/admin/ira', [admin::class, 'ira_index'])->name('admin_ira.index');
Route::get('/admin/ira/{event}', [admin::class, 'ira_show'])->name('admin_ira.show');
Route::post('/admin/ira/{id}/assign', [admin::class, 'ira_assign'])->name('admin_ira.assign');

Route::get('/faculty/events_req',[faculty::class,'index'])->name('faculty_events_req.index');
Route::get('/faculty/events_req/create',[faculty::class,'create'])->name('faculty_events_req.create');
Route::get('/faculties/{id}', [faculty::class, 'getFacultyDetails']);
Route::post('/faculty/events_req/store',[faculty::class,'store'])->name('faculty_events_req.store');
Route::get('/faculty/events_req/{event_name}', [faculty::class, 'show'])->name('faculty_events_req.show');
Route::get('/faculty/eventsList', [faculty::class, 'events_index'])->name('faculty_eventsList.index');
Route::get('/faculty/eventsList/{event}', [faculty::class, 'events_show'])->name('faculty_eventsList.show');
Route::get('/faculty/ira', [faculty::class, 'ira_index'])->name('faculty_ira.index');
Route::get('/faculty/ira/evaluate', [faculty::class, 'ira_evaluate'])->name('faculty_ira_evaluate.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('/login/check', [LoginController::class, 'login'])->name('login.validate');
Route::get('/register', [LoginController::class, 'showregisterForm'])->name('register.index');
Route::post('/register/store', [LoginController::class, 'register'])->name('register.store');