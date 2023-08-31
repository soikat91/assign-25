<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ManagerController;
use App\Http\Middleware\TokenVerificationMiddleware;
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
    return view('page.loginPage');
});

Route::controller(ManagerController::class)->group(function (){
    Route::post('/manager-registration','managerRegistration');
    Route::post('/login','Login');
    Route::get('/logout','Logout');
    Route::get('/employee-list', 'employeeLeavesList')->middleware(TokenVerificationMiddleware::class);
    Route::post('/employee-list-By-id', 'employeeLeavesListById')->middleware(TokenVerificationMiddleware::class);
  

     //page route
     Route::get('/manager','managerDashPage')->middleware(TokenVerificationMiddleware::class);
     Route::get('/manager-reg-page','managerRegistrationPage');
});

Route::controller(EmployeeController::class)->group(function (){
    Route::post('/employee-registration','employeeRegistration'); 
    Route::get('/total-employee','TotalEmployee')->middleware(TokenVerificationMiddleware::class);


    //page route
    Route::get('/employee','employeeDashPage')->middleware(TokenVerificationMiddleware::class);
    Route::get('/emp-reg-page','EmpRegPage');
});


Route::controller(LeaveCategoryController::class)->group(function(){
    Route::post('/create-category','CategoryCreate');
    Route::get('/list-category','CategoryList');
});

Route::controller(LeaveController::class)->group(function (){
     
    Route::get('/get-leave-list','GetList')->middleware(TokenVerificationMiddleware::class);
    Route::post('/create-leave','CreateLeave')->middleware(TokenVerificationMiddleware::class);
    Route::post('/updte-leave-status','updateStatus')->middleware(TokenVerificationMiddleware::class);

    Route::get('/total-leaveApplication','TotalLeaveApplication')->middleware(TokenVerificationMiddleware::class);
    Route::get('/total-pending-by-emp','TotalPendingbyEmloyee')->middleware(TokenVerificationMiddleware::class);
    Route::get('/total-approved-by-employee','TotalApprovedByEmployee')->middleware(TokenVerificationMiddleware::class);
    Route::get('/total-pending','TotalPending')->middleware(TokenVerificationMiddleware::class);
    Route::get('/total-approved','TotalApproved')->middleware(TokenVerificationMiddleware::class);
});



