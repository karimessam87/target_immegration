<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
  public function index(Request $request)
  {
    Auth::logout();
    Auth::guard('client')->logout();
    Auth::guard('employee')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('dashboard');
  }
}
