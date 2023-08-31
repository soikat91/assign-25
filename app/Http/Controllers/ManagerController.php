<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Manager;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManagerController extends Controller
{
    function managerDashPage():View {
        return view('page.managerDashboard');
      }

      function managerRegistrationPage():View {
        return view('page.managerRegPage');
      }

      

   function managerRegistration(Request $request){
    try{
        Manager::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ]);
        return 1;

    }catch(Exception $e){
        return 0;
    }
    
     
   }
    function Login(Request $request) {
        $email      = $request->input('email');
        $password   = $request->input('password');

        $manager = Manager::where('email', '=', $email)
            ->where('password', '=', $password)
            ->select('id', 'role')
            ->first();

        $employee = Employee::where('email', '=', $email)
            ->where('password', '=', $password)
            ->select('id', 'role')
            ->first();

        if ($manager !== null) {
            // Manager login -> JWT Token issue
            $token = JWTToken::createToken($email, $manager->id, $manager->role);
            return response()->json([
                'status' => 'success',
                'message' => 'Manager login successfully',
                // 'token' => $token,
                'id' => $manager->id,
                'role' => $manager->role
            ], 200)->cookie('token', $token, 60*24*30);
        }elseif ($employee !== null) {
            // Employee login -> JWT Token issue
            $token = JWTToken::createToken($email, $employee->id, $employee->role);
            return response()->json([
                'status' => 'success',
                'message' => 'Employee login successfully',
                'token' => $token,
                'id' => $employee->id,
                'role' => $employee->role
            ], 200)->cookie('token', $token, 60 * 24 * 30);
        }else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Email or password dont match or found'
            ],200);
        }
    }//end method


   function Logout(){
    return redirect('/')->cookie('token','',-1);
   }
   
   public function employeeLeavesList(Request $request){
    $employe_id = $request->header('id');
    return Leave::with('employee')->get();
   }

   public function employeeLeavesListById(Request $request){
    $leave_id = $request->input('leave_id');
    return  Leave::with('employee')->where('id', $leave_id)->first();
   }

}
