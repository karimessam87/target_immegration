<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $clients_count = Client::count();
        $employee_count = Employee::count();
        $latest_employee_count = Employee::latest()->limit(10)->count();
        $latest_tickets_count = Ticket::latest()->limit(10)->count();
        $last_month_tickets_count = Ticket::whereMonth('created_at',Carbon::now()->subMonth()->month)->count();

        return view('backend.dashboard',compact(
            'title','clients_count','employee_count','last_month_tickets_count','latest_employee_count','latest_tickets_count',
        ));
    }
}
