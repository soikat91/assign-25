<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveCategory;

class LeaveCategoryController extends Controller
{
    function CategoryCreate(Request $request){

        return LeaveCategory::create([
  
              'name'=>$request->input('name')
          ]);
      }

      function CategoryList(){
        
        return LeaveCategory::get();
      }
}
