<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\CoController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/qrlist', function () { return view('qrlist'); })->name('qrlist');
    Route::get('/reportesgral', function () { return view('rg'); })->name('reportgral');
    Route::get('/reportesgral/add', function () { return view('add'); })->name('add');
    Route::get('/catalogos', function () { return view('catalogos'); })->name('catalogos');
    Route::get('/usuarios', function () { return view('people'); })->name('usuarios');
    Route::get('/temp', function () { return view('temp'); })->name('temp');
    Route::get('/componentes', function () { return view('comp'); })->name('componentes');
    Route::get('/reporte-normal/{id}/{tipoReporte}', [ReportsController::class, 'rg_report_1'])->name('reporteNormal');
    Route::resource('ages', AgeController::class)->names('ages');
    Route::resource('cos', CoController::class)->names('cos');
    Route::resource('adminuser', UserController::class)->names('admin.user');
    Route::get('/look', function () { return view('look'); })->name('look');
    Route::get('/admin', function () { return view('admin'); })->name('admin');

});

