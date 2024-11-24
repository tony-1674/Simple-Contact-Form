<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;

Route::get('/', [ContactFormController::class, 'index']);
Route::post('submit', [ContactFormController::class, 'submit'])->name('submit');
Route::get('admin-panel', [ContactFormController::class, 'adminPanel'])->name('admin-panel');