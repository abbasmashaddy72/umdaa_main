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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'verified', 'password.confirm', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('role', RoleController::class); // Role List
    Route::resource('user', UserController::class); // User List
    Route::resource('branch', BranchController::class); // Setting List
    Route::resource('department', DepartmentController::class); // Department List
    Route::resource('referral', ReferralController::class); // Referral List
    Route::resource('procedure', ProcedureController::class); // Procedure List
    Route::resource('patient', PatientController::class); // Patient List
    Route::resource('service', ServiceController::class); // Service List
    Route::resource('doctor', DoctorController::class); // Doctor List
    Route::resource('appointment', AppointmentController::class); // Appointment List
    Route::resource('billing', BillingController::class); // Billing List
    Route::resource('bulk_sms', BulkSMSController::class); // BulkSMS List
});

require __DIR__ . '/auth.php';
