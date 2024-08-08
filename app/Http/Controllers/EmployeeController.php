<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\Employee;

class EmployeeController extends Controller
{   
    
    public function storeEmployee(Request $request){
        try{
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

            Log::info('Employee Added Successfully');
            return redirect()->route('admin_dashboard')->with('Employee Added Successfully');
            //return back()->with('Employee Added Successfully');
        }
        catch(Exception $e){
            Log::error('Exception caught in update method: ' .$e);
            $m=$e->getMessage();
            return back()->withErrors(['error' => 'An error occurred: ' . $m]);
        }
    }
    
    public function editEmployee(Request $request, $id)
    {
        try {
            
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:employees,email,' . $id,
                'password' => 'nullable',
            ]);

            $employee = Employee::find($id);
            if (!$employee) {
                return back()->withErrors(['error' => 'Employee not found']);
            }

            $employee->name = $request->name;
            $employee->email = $request->email;

            if ($request->filled('password')) {
                $employee->password = Hash::make($request->password);
            }

            $employee->save();

            Log::info('Employee Details Updated Successfully');
            return redirect()->route('employee_dashboard')->with('success', 'Details Edited Successfully');
        } 
        catch(Exception $e){
            Log::error('Exception caught in edit method: ' . $e);
            $m = $e->getMessage();
            return back()->withErrors(['error' => 'An error occurred: ' . $m]);
        }
    }

}
