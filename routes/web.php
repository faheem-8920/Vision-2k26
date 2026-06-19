<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.index');
});
Route::get('/goadmin', function () {
    return view('Admin.index');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
