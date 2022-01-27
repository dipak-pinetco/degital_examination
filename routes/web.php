<?php

use App\Http\Controllers\DashboardController;
use App\Models\AcademicYear;
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

    // Route::resource('/class',[classContro])
});



require __DIR__ . '/auth.php';
