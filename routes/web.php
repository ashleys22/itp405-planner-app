<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');


Route::middleware(['custom-auth'])->group(function () {
    Route::get('/tasks/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');

    Route::resource('tasks', TaskController::class);
    // Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    // Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    // Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    // Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    // Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    // Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    // Route::post('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', function () {
        return view('courses.create');
    });
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::get('/about', function () {
    return view('about');
});




if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}
