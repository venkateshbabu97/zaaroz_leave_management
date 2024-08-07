<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        $employee = Employee::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            auth()->guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        } elseif ($employee && Hash::check($request->password, $employee->password)) {
            auth()->guard('employee')->login($employee);
            return redirect()->route('employee.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function adminDashboard()
    {
        $employees = Employee::all();
        return view('admin.dashboard', compact('employees'));
    }

    public function employeeDashboard()
    {
        $employee = Auth::guard('employee')->user();
        return view('employee.dashboard', compact('employee'));
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('employee')->check()) {
            Auth::guard('employee')->logout();
        }

        return redirect()->route('login');
    }
}

