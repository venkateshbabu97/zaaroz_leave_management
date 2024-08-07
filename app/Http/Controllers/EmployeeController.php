<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function storeEmployee(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $employee = new Employee();
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->password=Hash::make($request->password);
        $employee->save();
        
        return redirect()->route('admin_dashboard')->with('Employee Added Successfully');
        //return back()->with('Employee Added Successfully');
    }
}
