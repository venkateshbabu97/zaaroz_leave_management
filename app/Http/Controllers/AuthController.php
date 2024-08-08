<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;
use App\Models\Employee;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try{

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $admin = Admin::where('email', $request->email)->first();
            $employee = Employee::where('email', $request->email)->first();

            if ($admin && Hash::check($request->password, $admin->password)) 
            {
                auth()->guard('admin')->login($admin);
                Log::info('Admin Logged In');
                return redirect()->route('admin_dashboard');
            } 
            elseif ($employee && Hash::check($request->password, $employee->password)) 
            {
                auth()->guard('employee')->login($employee);
                Log::info('Employee Logged In');
                return redirect()->route('employee_dashboard')->with('success', 'Welcome');
            }

            return back()->withErrors([
                'email' => 'Invalid Email Or Password',
            ]);

        }
        catch(Exception $e){
            Log::error('Exception caught in store method: ' .$e);
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }

    }

    public function adminDashboard()
    {
        $employees = Employee::all();
        return view('admin.dashboard',['employees'=>$employees]);
    }

    public function employeeDashboard()
    {
        $employee = Auth::guard('employee')->user();
        return view('employee.dashboard',['employee'=>$employee]);
    }

    public function logout(Request $request)
    {   
        try{

            if (Auth::guard('admin')->check()) {
                Auth::guard('admin')->logout();
            } 
            elseif (Auth::guard('employee')->check()) {
                Auth::guard('employee')->logout();
            }

            Log::info('Logged out Successfully');
            return redirect()->route('login');

        }
        catch(Exception $e){
            Log::error('Exception caught in store method: ' .$e);
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);                        
        }
    }

}
