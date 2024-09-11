<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/homes/dashboard', function () {
    return view('homes.dashboard');
});

Route::get('/homes/dashboard_board', function () {
    return view('homes.dashboard_board');
});

Auth::routes();

Route::get('/home', function () {
    return view('homes.home');
})->name('homes.home');

Route::resource('/workspaces', \App\Http\Controllers\WorkspaceController::class);


// Các route hiển thị trong boards

Route::prefix('b')
    ->as('b.')
    ->group(function () {

    Route::get('/', function () {
        return view('boards.index');
    })->name('index');

    Route::get('table', function () {
        return view('tables.index');
    })->name('table');

    Route::get('ganttChart', function () {
        return view('ganttCharts.index');
    })->name('ganttChart');

    Route::get('list', function () {
        return view('lists.index');
    })->name('list');

});

