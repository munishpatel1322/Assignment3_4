<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Reviewer\ReviewerController;
use App\Http\Controllers\Issuer\IssuerController;
use App\Http\Controllers\Auditor\AuditorController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\BulkUploadController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminGuaranteeController;
use App\Http\Controllers\Admin\AdminFileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Applicant\ApplicantGuaranteeController;

//Auth::routes(); // This automatically registers login, logout, and registration routes

Route::get('/', function () {
    return redirect('/login');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
    Route::resource('guarantees', AdminGuaranteeController::class);
    Route::get('files', [AdminFileController::class, 'index'])->name('files.index');
    Route::post('files', [AdminFileController::class, 'store'])->name('files.store');
    Route::delete('files/{id}', [AdminFileController::class, 'destroy'])->name('files.destroy');
});

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


Route::get('admin/users/{user}/edit', [App\Http\Controllers\Admin\AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{user}', [App\Http\Controllers\Admin\AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{user}', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy'])->name('admin.users.destroy');
Route::post('admin/guarantees', [AdminGuaranteeController::class, 'store'])->name('admin.guarantees.store');


// Applicant Routes
Route::prefix('applicant')->name('applicant.')->middleware('auth')->group(function () {
    Route::get('dashboard', [ApplicantController::class, 'dashboard'])->name('dashboard');
    Route::resource('guarantees', ApplicantGuaranteeController::class);
});
Route::get('/reviewer/login', [ReviewerLoginController::class, 'showLoginForm'])->name('reviewer.login');
Route::post('/reviewer/login', [ReviewerLoginController::class, 'login']);

// Reviewer Routes
Route::prefix('reviewer')->name('reviewer.')->middleware('auth')->group(function () {
    Route::get('dashboard', [ReviewerController::class, 'dashboard'])->name('dashboard');
    Route::get('guarantees/pending', [ReviewerGuaranteeController::class, 'pending'])->name('guarantees.pending');
    Route::get('guarantees/{guarantee}', [ReviewerGuaranteeController::class, 'show'])->name('guarantees.show');
    Route::post('guarantees/{guarantee}/review', [ReviewerGuaranteeController::class, 'review'])->name('guarantees.review');
});

// Guarantees
Route::resource('guarantees', GuaranteeController::class)->middleware('auth');

// Bulk Upload
Route::middleware('auth')->group(function () {
    Route::get('/bulk-upload', [BulkUploadController::class, 'showForm'])->name('bulk.form');
    Route::post('/bulk-upload', [BulkUploadController::class, 'store'])->name('bulk.upload');
});
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Auth::routes(['logout' => false]); // Disable default logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
