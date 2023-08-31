<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{   
    function employeeDashPage():View {
      return view('page.employeeDashboard');
    }
    function EmpRegPage():View {
      return view('page.empRegPage');
    }


    

    function employeeRegistration(Request $request){
      try{
        Employee::create([
          'name'=>$request->input('name'),
          'email'=>$request->input('email'),
          'password'=>$request->input('password'),
          'department'=>$request->input('department')
          
         ]);
         return 1;

      }catch(Exception $e){
        return 0;
      }
       
         
       }
      
       //for manager dashboard
   function TotalEmployee(){
  return  $count = Employee::all()->count();
   }
     
}
