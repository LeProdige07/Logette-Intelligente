<?php

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('access:User');
Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('access:Role');
Route::resource('logettes', App\Http\Controllers\LogetteController::class)->middleware('access:Logette');

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/allumer/{id}', [App\Http\Controllers\LogetteController::class, 'allumer']);
Route::get('/eteindre/{id}', [App\Http\Controllers\LogetteController::class, 'eteindre']);
