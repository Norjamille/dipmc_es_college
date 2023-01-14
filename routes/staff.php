<?php


Route::prefix('staff/dashboard')->controller(\App\Http\Controllers\Staff\DashboardController::class)
->middleware(['auth', 'role:staff'])
->group(function () {
    Route::get('/', 'index')->name('staff.dashboard');
});

Route::prefix('staff/enrollment')->controller(\App\Http\Controllers\Staff\StudentEnrollmentController::class)
->middleware(['auth', 'role:staff'])
->group(function () {
    Route::get('/', 'index')->name('staff.enrollment');
});