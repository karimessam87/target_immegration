<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = "Login";
        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $authenticate = auth()->attempt($request->only('email', 'password'));
        if (!$authenticate) {
            return back()->with('login_error', "Invalid Login Credentials");
        }
        return redirect()->route('dashboard');
    }

    public function employee(Request $request)
    {
        $title = "Employees Login";
        return view('auth.employees.login', compact('title'));
    }

    public function employeeLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $authenticated = Auth::guard('employee')->attempt($credentials, $request->remember);
        if ($authenticated) {
            return redirect()->intended(route('employee.guest.login'));
        } else {
            return redirect()->back()->with(['error' => 'Failed Login Wrong Username Or Password', 'login' => 'error']);
        }
    }

    public function clients(Request $request)
    {
        $title = "Cleints Login";
//        return view('auth.employees.login', compact('title'));
    }

    public function clientLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $authenticated = Auth::guard('employee')->attempt($credentials, $request->remember);
        if ($authenticated) {
            return redirect()->intended(route('employee.guest.login'));
        } else {
            return redirect()->back()->with(['error' => 'Failed Login Wrong Username Or Password', 'login' => 'error']);
        }
    }


}
