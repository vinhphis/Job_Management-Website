<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('dashbroad');
});

Route::get('tables', function () {
    return view('tables.index');
});

Route::get('ganttChart', function () {
    return view('ganttCharts.index');
});
Route::get('boards', function () {
    return view('boards.index');
});

Route::get('lists', function () {
    return view('lists.index');
});


