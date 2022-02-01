<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\CreateAdmin;
use App\Http\Livewire\Admin\ListAdmin;
use App\Http\Livewire\Admin\UpdateAdmin;
use App\Http\Livewire\Classes\CreateClass;
use App\Http\Livewire\Classes\ListClass;
use App\Http\Livewire\Classes\UpdateClass;
use App\Models\School;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;
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
Route::get('/test', function () {
    return view('test');
});
Route::get('/query', function () {
    DB::enableQueryLog();
    $data = School::with('academic_year')->get();
    dd($data, DB::getQueryLog());
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/admin')->group(function () {
        Route::get('/{id}', UpdateAdmin::class)->name('admin.edit');
        Route::get('/create', CreateAdmin::class)->name('admin.create');
        Route::get('/', ListAdmin::class, 'render')->name('admin.index');
    });

    Route::prefix('/classes')->group(function () {
        Route::get('/{id}', UpdateClass::class)->name('classes.edit');
        Route::get('/create', CreateClass::class)->name('classes.create');
        Route::get('/', ListClass::class, 'render')->name('classes.index');
    });
});



require __DIR__ . '/auth.php';
