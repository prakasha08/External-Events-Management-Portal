<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\Events_request;
use App\Http\Controllers\ira;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/student/events_req',[Events_request::class,'index'])->name('events_req.index');
Route::get('/student/events_req/create',[Events_request::class,'create'])->name('events_req.create');
Route::post('/student/events_req/store',[Events_request::class,'store'])->name('events_req.store');
Route::get('/student/events_req/{event_name}', [Events_request::class, 'show'])->name('events_req.show');
Route::get('/student/eventsList', [Events_request::class, 'events_index'])->name('eventsList.index');
Route::get('/student/eventsList/{event}', [Events_request::class, 'events_show'])->name('eventsList.show');
Route::get('/admin/events_req',[admin::class,'eventsReq_index'])->name('admin_events_req.index');
Route::get('/admin/events_req/{id}/evaluate', [admin::class, 'evaluate'])->name('events_req.evaluate');
Route::post('/admin/events_req/{id}/evaluate', [admin::class, 'storeEvaluation'])->name('events_req.storeEvaluation');
Route::get('/student/ira', [ira::class, 'ira_index'])->name('ira.index');
Route::get('/student/ira/create', [ira::class, 'ira_create'])->name('ira.create');
Route::post('/student/ira/store', [ira::class, 'ira_store'])->name('ira.store');

Route::get('/admin/eventsList', [admin::class, 'events_index'])->name('admin_events_List.index');
Route::get('/admin/eventsList/{event}', [admin::class, 'events_show'])->name('admin_events_List.show');
Route::get('/admin/eventsList/{event}/edit',[admin::class,'events_edit'])->name('admin_events_List.edit');
Route::put('/admin/eventsList/{event}', [admin::class, 'events_update'])->name('admin_events_List.update');
Route::delete('/admin/eventsList/{event}',[admin::class,'events_destroy'])->name('admin_events_List.delete');