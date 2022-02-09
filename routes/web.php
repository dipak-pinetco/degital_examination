<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admins\CreateAdmin;
use App\Http\Livewire\Admins\ListAdmin;
use App\Http\Livewire\Admins\UpdateAdmin;
use App\Http\Livewire\Classes\CreateClass;
use App\Http\Livewire\Classes\ListClass;
use App\Http\Livewire\Classes\UpdateClass;
use App\Http\Livewire\Students\CreateStudent;
use App\Http\Livewire\Students\ListStudent;
use App\Http\Livewire\Students\UpdateStudent;
use App\Http\Livewire\Teachers\CreateTeacher;
use App\Http\Livewire\Teachers\ListTeacher;
use App\Http\Livewire\Teachers\UpdateTeacher;
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

Route::middleware(['auth:web,teacher,student'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::prefix('/admins')->group(function () {
            Route::get('/edit/{id}', UpdateAdmin::class)->name('admins.edit');
            Route::get('/create', CreateAdmin::class)->name('admins.create');
            Route::get('/', ListAdmin::class, 'render')->name('admins.index');
        });

        Route::prefix('/teachers')->group(function () {
            Route::get('/edit/{id}', UpdateTeacher::class)->name('teachers.edit');
            Route::get('/create', CreateTeacher::class)->name('teachers.create');
            Route::get('/', ListTeacher::class, 'render')->name('teachers.index');
        });

        Route::prefix('/classes')->group(function () {
            Route::get('/edit/{id}', UpdateClass::class)->name('classes.edit');
            Route::get('/create', CreateClass::class)->name('classes.create');
            Route::get('/', ListClass::class, 'render')->name('classes.index');
        });
    });

    Route::group(['middleware' => ['role:admin|teacher']], function () {
        Route::prefix('/students')->group(function () {
            Route::get('/edit/{id}', UpdateStudent::class)->name('students.edit');
            Route::get('/create', CreateStudent::class)->name('students.create');
            Route::get('/', ListStudent::class, 'render')->name('students.index');
        });
    });
});



require __DIR__ . '/auth.php';
