<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;







 Route::get('/', [LoginController::class, 'registration'])->name('registration');
 Route::post('store', [LoginController::class, 'saveRegistration']);

 Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
 Route::middleware('preventPageAccess')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
    Route::post('save-login', [LoginController::class, 'saveLogin'])->name('save-login');
});
 Route::get('logout', [LoginController::class, 'logout'])->name('logout');


 Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');


Route::resource('employee', EmployeeController::class);
Route::post('employee-status/{id}',[EmployeeController::class,'status']);

// mailtrap