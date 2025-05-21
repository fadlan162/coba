<?php

use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\ProblemTypeController;


// Guest routes: hanya untuk yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'authenticate']);
});

// Authenticated routes: hanya untuk yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ReportsController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout']);

    // Tambahkan route lainnya di sini (CRUD reports, admin, etc)
});
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('role');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('problem-types', ProblemTypeController::class);
    Route::get('/problem-types/admin', [ProblemTypeController::class, 'admin'])->name('problem-types.admin');
});

Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
Route::get('/reports/create', [ReportsController::class, 'create'])->name('reports.create');
Route::post('/reports', [ReportsController::class, 'store'])->name('reports.store');
Route::get('/reports/{id}/edit', [ReportsController::class, 'edit'])->name('reports.edit');
Route::put('/reports/{id}', [ReportsController::class, 'update'])->name('reports.update');
Route::delete('/reports/{id}', [ReportsController::class, 'destroy'])->name('reports.destroy');
Route::redirect('/report', '/reports');
Route::resource('admin', AdminController::class);
Route::resource('admins', AdminController::class);
Route::get('/reports/admin', [ReportsController::class, 'index']); // daftar laporan
Route::get('/reports/admin/{id}', [ReportsController::class, 'show']); // detail laporan
Route::resource('companies', CompanieController::class);
Route::redirect('/companie', '/companies');
Route::get('/companie/create', [CompanieController::class, 'create'])->name('companie.create');
Route::put('/reports/report', [ReportsController::class, 'update']);
Route::delete('/reports/report', [ReportsController::class, 'destroy']);
Route::resource('/problem-types', ProblemTypeController::class)->middleware(['auth']);
Route::get('/problems', [ProblemTypeController::class, 'index'])->name('pages.problem.index');
// routes/web.php





