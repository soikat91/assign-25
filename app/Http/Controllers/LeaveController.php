<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Exception;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
   function GetList(Request $request){
    $employee_id = $request->header('employee_id');
    return Leave::where('employee_id', $employee_id)->get();
   }

   function CreateLeave(Request $request)
   {
      try{
      $employee_id = $request->header('employee_id');
    
      Leave::where('employee_id', $employee_id)->create([
       "subject"=>$request->input('subject'),
       "message"=>$request->input('message'),
       "reason"=>$request->input('reason'),
       "start_date"=>$request->input('start_date'),
       "end_date"=>$request->input('end_date'),
       "employee_id"=>$employee_id
       ]);
     return 1;

      }catch (Exception $e){
      return $e->getMessage();
      }
 
   }
    
   function TotalLeaveApplication(Request $request){

    $employee_id = $request->header('employee_id');
    $count = Leave::where('employee_id', $employee_id)->count();
    return $count;
   }

   function TotalPendingbyEmloyee(Request $request){

    $employee_id = $request->header('employee_id');
    $count = Leave::where('employee_id', $employee_id)->where('status','pending')
    ->count();
    return $count;
   }

   function TotalApprovedByEmployee(Request $request){

    $employeeId=$request->header('employee_id');
     return Leave::where('employee_id', $employeeId)->where('status','approved')->count();
   }

  
   function  TotalApproved(Request $request){
    
     return Leave::where('status','approved')->count();
   }

   //for manager dashboard
   function TotalPending(){
    $count = Leave::where('status','pending')
    ->count();
    return $count;
   }

   public function updateStatus(Request $request){
      try{
          $leave_id = $request->input('leave_id');
          $status = $request->input('status');
      
          Leave::where('id', $leave_id)->update([
              'status'=>$status
          ]);
          return 1;
  
      }catch(Exception $e){
          return 0;
      }
     
     }


}

