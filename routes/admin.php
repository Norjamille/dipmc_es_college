<?php

Route::prefix('admin/dashboard')->controller(\App\Http\Controllers\Admin\DashboardController::class)
->middleware(['auth','role:admin'])
->group(function(){
    Route::get('/','index')->name('admin.dashboard');
});


Route::prefix('admin/programs')->controller(\App\Http\Controllers\Admin\ProgramController::class)
->middleware(['auth','role:admin'])
->group(function(){
    Route::get('/','index')->name('admin.programs');
    Route::get('/create','create')->name('admin.programs.create');
    Route::post('/','store')->name('admin.programs.store');
    Route::get('/{program}/edit','edit')->name('admin.programs.edit');
    Route::put('/{program}/update','update')->name('admin.programs.update');
});

Route::prefix('admin/courses')->controller(\App\Http\Controllers\Admin\CourseController::class)
->middleware(['auth','role:admin'])
->group(function(){
    Route::get('/','index')->name('admin.courses');
    Route::get('/create','create')->name('admin.courses.create');
    Route::post('/','store')->name('admin.courses.store');
    Route::get('/{course}/edit','edit')->name('admin.courses.edit');
    Route::put('/{course}/update','update')->name('admin.courses.update');
});


Route::prefix('admin/programs')->controller(\App\Http\Controllers\Admin\ProgramSubjectOfferController::class)
->middleware(['auth','role:admin'])
->group(function(){
    Route::get('/{program}/subject-offers','index')->name('admin.programs.subject.offers');
    // Route::get('/create','create')->name('admin.courses.create');
    // Route::post('/','store')->name('admin.courses.store');
    // Route::get('/{course}/edit','edit')->name('admin.courses.edit');
    // Route::put('/{course}/update','update')->name('admin.courses.update');
});
