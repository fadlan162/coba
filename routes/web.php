<?php

use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanieController;

// Auth
Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('role');

Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
Route::get('/reports/create', [ReportsController::class, 'create'])->name('reports.create');
Route::post('/reports', [ReportsController::class, 'store'])->name('reports.store');
Route::get('/reports/{id}/edit', [ReportsController::class, 'edit'])->name('reports.edit');
Route::put('/reports/{id}', [ReportsController::class, 'update'])->name('reports.update');
Route::delete('/reports/{id}', [ReportsController::class, 'destroy'])->name('reports.destroy');
Route::redirect('/report', '/reports');
Route::resource('admin', AdminController::class);
Route::resource('admins', AdminController::class);
Route::resource('companies', CompanieController::class);
Route::redirect('/companie', '/companies');
Route::get('/companie/create', [CompanieController::class, 'create'])->name('companie.create');
Route::put('/reports/report', [ReportsController::class, 'update']);
Route::delete('/reports/report', [ReportsController::class, 'destroy']);



