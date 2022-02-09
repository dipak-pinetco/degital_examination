<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\CreateAdmin;
use App\Http\Livewire\Admin\ListAdmin;
use App\Http\Livewire\Admin\UpdateAdmin;
use App\Http\Livewire\Classes\CreateClass;
use App\Http\Livewire\Classes\ListClass;
use App\Http\Livewire\Classes\UpdateClass;
use App\Http\Livewire\Student\CreateStudent;
use App\Http\Livewire\Student\ListStudent;
use App\Http\Livewire\Student\UpdateStudent;
use App\Http\Livewire\Teacher\CreateTeacher;
use App\Http\Livewire\Teacher\ListTeacher;
use App\Http\Livewire\Teacher\UpdateTeacher;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::middleware(['auth:web,teacher'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/edit/{id}', UpdateAdmin::class)->name('admin.edit');
            Route::get('/create', CreateAdmin::class)->name('admin.create');
            Route::get('/', ListAdmin::class, 'render')->name('admin.index');
        });

        Route::prefix('/teacher')->group(function () {
            Route::get('/edit/{id}', UpdateTeacher::class)->name('teacher.edit');
            Route::get('/create', CreateTeacher::class)->name('teacher.create');
            Route::get('/', ListTeacher::class, 'render')->name('teacher.index');
        });

        Route::prefix('/classes')->group(function () {
            Route::get('/edit/{id}', UpdateClass::class)->name('classes.edit');
            Route::get('/create', CreateClass::class)->name('classes.create');
            Route::get('/', ListClass::class, 'render')->name('classes.index');
        });
    });

    Route::group(['middleware' => ['role:admin|teacher']], function () {
        Route::prefix('/student')->group(function () {
            // Route::get('/edit/{id}', UpdateStudent::class)->name('student.edit');
            // Route::get('/create', CreateStudent::class)->name('student.create');
            // Route::get('/', ListStudent::class, 'render')->name('student.index');
        });
    });
});



require __DIR__ . '/auth.php';
