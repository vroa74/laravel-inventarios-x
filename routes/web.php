<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/ofi.php';
require __DIR__ . '/auth_routes.php';

Route::get('/', function () { return view('welcome'); })->name('welcome');


