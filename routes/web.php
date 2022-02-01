<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\CreateAdmin;
use App\Http\Livewire\Admin\ListAdmin;
use App\Http\Livewire\Admin\UpdateAdmin;
use App\Models\School;
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

    Route::get('/admin/edit/{id}', UpdateAdmin::class)->name('admin.edit');
    Route::get('/admin/create', CreateAdmin::class)->name('admin.create');
    Route::get('/admin', ListAdmin::class, 'render')->name('admin.index');
    Route::resource('/admin', AdminController::class)->except(['index', 'create', 'store', 'edit', 'update']);
    // Route::resource('/admin', AdminController::class);
});



require __DIR__ . '/auth.php';
