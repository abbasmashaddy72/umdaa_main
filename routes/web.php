<?php

use App\Http\Controllers\DarkModeController;
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

require __DIR__ . '/test.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::group(['middleware' => 'auth', 'verified', 'password.confirm', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

require __DIR__ . '/auth.php';
