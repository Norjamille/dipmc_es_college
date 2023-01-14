<?php

Route::prefix('admin/dashboard')->controller(\App\Http\Controllers\Admin\DashboardController::class)
->middleware(['auth', 'role:admin'])
->group(function () {
    Route::get('/', 'index')->name('admin.dashboard');
});

Route::prefix('admin/programs')->controller(\App\Http\Controllers\Admin\ProgramController::class)
->middleware(['auth', 'role:admin'])
->group(function () {
    Route::get('/', 'index')->name('admin.programs');
    Route::get('/create', 'create')->name('admin.programs.create');
    Route::post('/', 'store')->name('admin.programs.store');
    Route::get('/{program}/edit', 'edit')->name('admin.programs.edit');
    Route::put('/{program}/update', 'update')->name('admin.programs.update');
});

Route::prefix('admin/subjects')->controller(\App\Http\Controllers\Admin\SubjectController::class)
->middleware(['auth', 'role:admin'])
->group(function () {
    Route::get('/', 'index')->name('admin.subjects');
    Route::get('/create', 'create')->name('admin.subjects.create');
    Route::post('/', 'store')->name('admin.subjects.store');
    Route::get('/{subject}/edit', 'edit')->name('admin.subjects.edit');
    Route::put('/{subject}/update', 'update')->name('admin.subjects.update');
});

Route::prefix('admin/programs')->controller(\App\Http\Controllers\Admin\ProgramSubjectOfferController::class)
->middleware(['auth', 'role:admin'])
->group(function () {
    Route::get('/{program}/subject-offers', 'index')->name('admin.programs.subject.offers');
    Route::get('/{program}/subject-offers/{yearLevel}/create', 'create')->name('admin.programs.subject.offers.create');
    Route::post('/subject-offers', 'store')->name('admin.programs.subject.offers.store');
    // Route::get('/{subject}/edit','edit')->name('admin.subjects.edit');
    // Route::put('/{subject}/update','update')->name('admin.subjects.update');
});
