<?php

use App\Http\Controllers\Admin\Client\ClientTypeController;
use App\Http\Controllers\Admin\Client\DocumentTypeController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\FileLabelController;
use App\Http\Controllers\Admin\FileStatueController;
use App\Http\Controllers\Admin\FileTypeController;
use App\Http\Controllers\Admin\FlagController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\Task\TaskAttachmentController;
use App\Http\Controllers\Admin\Task\TaskController;
use App\Http\Controllers\Admin\Task\TaskTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\Admin\GoalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\TaxesController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Admin\BackupsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\GoalTypeController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeaveTypeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\EmployeeLeaveController;
use App\Http\Controllers\Admin\ProvidentFundController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Frontend\JobApplicationController;
use App\Http\Controllers\Admin\EmployeeAttendanceController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\JobController as BackendJobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'guest:employee', 'prefix' => 'employee-guest', 'as' => 'employee.guest.'], function () {
  Route::get('login', [LoginController::class, 'employee'])->name('login');
  Route::post('login', [LoginController::class, 'employeeLogin']);

  Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
  Route::post('forgot-password', [ForgotPasswordController::class, 'reset']);
});

Route::group(['middleware' => 'auth:employee', 'prefix' => 'employee-logged', 'as' => 'employees.logged.'], function () {
  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('logout', [LogoutController::class, 'index'])->name('logout');

  //apps routes

  Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
  Route::post('contacts', [ContactController::class, 'store']);
  Route::put('contacts', [ContactController::class, 'update']);
  Route::delete('contacts', [ContactController::class, 'destroy'])->name('contact.destroy');
  Route::get('file-manager', [FileManagerController::class, 'index'])->name('filemanager');

  Route::get('holidays', [HolidayController::class, 'index'])->name('holidays');
  Route::post('holidays', [HolidayController::class, 'store']);
  Route::post('holidays/{holiday}', [HolidayController::class, 'completed'])->name('completed');
  Route::put('holidays', [HolidayController::class, 'update']);
  Route::delete('holidays', [HolidayController::class, 'destroy'])->name('holiday.destroy');


  Route::get('departments', [DepartmentController::class, 'index'])->name('departments');
  Route::post('departments', [DepartmentController::class, 'store']);
  Route::put('departments', [DepartmentController::class, 'update']);
  Route::delete('departments', [DepartmentController::class, 'destroy'])->name('department.destroy');

  Route::get('designations', [DesignationController::class, 'index'])->name('designations');
  Route::put('designations', [DesignationController::class, 'update']);
  Route::post('designations', [DesignationController::class, 'store']);
  Route::delete('designations', [DesignationController::class, 'destroy'])->name('designation.destroy');

  // settings routes
  Route::get('settings/theme', [SettingsController::class, 'index'])->name('settings.theme');
  Route::post('settings/theme', [SettingsController::class, 'updateTheme']);
  Route::get('settings/company', [SettingsController::class, 'company'])->name('settings.company');
  Route::post('settings/company', [SettingsController::class, 'updateCompany']);
  Route::get('settings/invoice', [SettingsController::class, 'invoice'])->name('settings.invoice');
  Route::post('settings/invoice', [SettingsController::class, 'updateInvoice']);
  Route::get('settings/attendance', [SettingsController::class, 'attendance'])->name('settings.attendance');
  Route::post('settings/attendance', [SettingsController::class, 'updateAttendance']);
  Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
  Route::post('change-password', [ChangePasswordController::class, 'update']);

  Route::get('leave-type', [LeaveTypeController::class, 'index'])->name('leave-type');
  Route::post('leave-type', [LeaveTypeController::class, 'store']);
  Route::delete('leave-type', [LeaveTypeController::class, 'destroy'])->name('leave-type.destroy');
  Route::put('leave-type', [LeaveTypeController::class, 'update']);

  Route::get('policies', [PolicyController::class, 'index'])->name('policies');
  Route::post('policies', [PolicyController::class, 'store']);
  Route::delete('policies', [PolicyController::class, 'destroy'])->name('policy.destroy');

  Route::resource('invoices', InvoiceController::class)->except('destroy');
  Route::delete('invoices', [InvoiceController::class, 'destroy'])->name('invoices.destroy');

  Route::get('expenses', [ExpenseController::class, 'index'])->name('expenses');
  Route::post('expenses', [ExpenseController::class, 'store']);
  Route::put('expenses', [ExpenseController::class, 'update']);
  Route::delete('expenses', [ExpenseController::class, 'destroy']);

  Route::get('provident-fund', [ProvidentFundController::class, 'index'])->name('provident-fund');
  Route::post('provident-fund', [ProvidentFundController::class, 'store']);
  Route::put('provident-fund', [ProvidentFundController::class, 'update']);
  Route::delete('provident-fund', [ProvidentFundController::class, 'destroy']);

  Route::get('taxes', [TaxesController::class, 'index'])->name('taxes');
  Route::post('taxes', [TaxesController::class, 'store']);
  Route::put('taxes', [TaxesController::class, 'update']);
  Route::delete('taxes', [TaxesController::class, 'destroy']);

  Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
    Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
    Route::put('/{client}', [ClientController::class, 'update'])->name('updated');
    Route::get('/{client}', [ClientController::class, 'show'])->name('show');
    Route::get('spouse/{client}', [ClientController::class, 'spouseDestroy'])->name('spouse.destroy');
    Route::get('parent/{client}', [ClientController::class, 'parentDestroy'])->name('parent.destroy');
    Route::get('children/{child}', [ClientController::class, 'childDestroy'])->name('child.destroy');
    Route::group(['prefix' => 'document-upload', 'as' => 'document.upload.'], function () {
      Route::delete('/{document}', [ClientController::class, 'documentDestroy'])->name('destroy');
      Route::post('/{client}', [ClientController::class, 'documentUpdate'])->name('update');
    });
    Route::group(['prefix' => 'education-certificate', 'as' => 'education.certificate.'], function () {
      Route::delete('/{client_education}', [ClientController::class, 'educationDestroy'])->name('destroy');
      Route::post('/{client}', [ClientController::class, 'educationUpdate'])->name('update');
    });
    Route::group(['prefix' => 'education-language', 'as' => 'education.language.'], function () {
      Route::delete('/{language}', [ClientController::class, 'languageDestroy'])->name('destroy');
      Route::post('/{client}', [ClientController::class, 'languageUpdate'])->name('update');
    });
    Route::group(['prefix' => 'financial-report', 'as' => 'financial.report.'], function () {
      Route::post('/{client}', [ClientController::class, 'financialUpdate'])->name('update');
      Route::delete('/{financial_report}', [ClientController::class, 'financialDestroy'])->name('destroy');
    });
    Route::group(['prefix' => 'canadian-connection', 'as' => 'canadian.connection.'], function () {
      Route::post('/{client}', [ClientController::class, 'canadianUpdate'])->name('update');
      Route::delete('/{canadian_connection}', [ClientController::class, 'canadianDestroy'])->name('destroy');
    });
    Route::group(['prefix' => 'work-history', 'as' => 'work.history.'], function () {
      Route::post('/{client}', [ClientController::class, 'workUpdate'])->name('update');
      Route::delete('/{work_history}', [ClientController::class, 'workDestroy'])->name('destroy');
    });

    Route::resource('/', ClientController::class);
    Route::resource('/manage/types', ClientTypeController::class);
    Route::put('/details/{client}', [ClientController::class, 'detailsUpdate'])->name('update.details');

  });
  Route::group(['prefix' => 'labels', 'as' => 'labels.'], function () {
    Route::delete('/{label}', [LabelController::class, 'destroy'])->name('destroy');
    Route::patch('/{label}', [LabelController::class, 'update'])->name('updated');
    Route::resource('/', LabelController::class);
  });
  Route::group(['prefix' => 'files', 'as' => 'files.', 'controller'], function () {
    Route::delete('/{file}', [FileController::class, 'destroy'])->name('destroy');
    Route::patch('/{file}', [FileController::class, 'update'])->name('updated');
    Route::resource('/', FileController::class);
    Route::resource('/types', FileTypeController::class);
    Route::resource('/status', FileStatueController::class);
    Route::resource('/labels', FileLabelController::class);
  });
  Route::group(['prefix' => 'flags', 'as' => 'flags.'], function () {
    Route::delete('/{flag}', [FlagController::class, 'destroy'])->name('destroy');
    Route::patch('/{flag}', [FlagController::class, 'update'])->name('updated');
    Route::resource('/', FlagController::class);

  });

  Route::group(['prefix' => 'document-types', 'as' => 'document.types.'], function () {
    Route::delete('/{type}', [DocumentTypeController::class, 'destroy'])->name('destroy');
    Route::patch('/{type}', [DocumentTypeController::class, 'update'])->name('updated');
    Route::resource('/', DocumentTypeController::class);
  });


//    Route::get('clients', [ClientController::class, 'index'])->name('clients');
//    Route::post('clients', [ClientController::class, 'store'])->name('client.add');
//    Route::put('clients', [ClientController::class, 'update'])->name('client.update');
//    Route::delete('clients', [ClientController::class, 'destroy'])->name('client.destroy');
  Route::get('clients-list', [ClientController::class, 'lists'])->name('clients-list');

  Route::get('employees', [EmployeeController::class, 'index'])->name('employees');
  Route::post('employees', [EmployeeController::class, 'store'])->name('employee.add');
  Route::get('employees-list', [EmployeeController::class, 'list'])->name('employees-list');
  Route::patch('employees', [EmployeeController::class, 'update'])->name('employee.update');
  Route::delete('employees', [EmployeeController::class, 'destroy'])->name('employee.destroy');

  Route::get('employees/attendance', [EmployeeAttendanceController::class, 'index'])->name('employees.attendance');
  Route::post('employees/attendance', [EmployeeAttendanceController::class, 'store']);
  Route::put('employees/attendance', [EmployeeAttendanceController::class, 'update']);
  Route::delete('employees/attendance', [EmployeeAttendanceController::class, 'destroy']);

  Route::get('tickets', [TicketController::class, 'index'])->name('tickets');
  Route::get('tickets/show/{subject}', [TicketController::class, 'show'])->name('ticket-view');
  Route::post('tickets', [TicketController::class, 'store']);
  Route::put('tickets', [TicketController::class, 'update']);
  Route::delete('tickets', [TicketController::class, 'destroy']);

  Route::get('overtime', [OvertimeController::class, 'index'])->name('overtime');
  Route::post('overtime', [OvertimeController::class, 'store']);
  Route::put('overtime', [OvertimeController::class, 'update']);
  Route::delete('overtime', [OvertimeController::class, 'destroy']);

  Route::get('projects', [ProjectController::class, 'index'])->name('projects');
  Route::get('projects/show/{name}', [ProjectController::class, 'show'])->name('project.show');
  Route::post('projects', [ProjectController::class, 'store']);
  Route::put('projects', [ProjectController::class, 'update']);
  Route::delete('projects', [ProjectController::class, 'destroy']);
  Route::get('project-list', [ProjectController::class, 'list'])->name('project-list');

  Route::group(['prefix' => 'leads', 'as' => 'leads.'], function () {
    Route::delete('/{lead}', [LeadController::class, 'destroy'])->name('destroy');
    Route::patch('/{lead}', [LeadController::class, 'update'])->name('update');
    Route::get('/{lead}', [LeadController::class, 'status'])->name('status');
    Route::resource('/', LeadController::class);
  });
  Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
    Route::patch('/{task}', [TaskController::class, 'update'])->name('update');
    Route::get('/{task}', [TaskController::class, 'show'])->name('show');
    Route::get('/status/{task}', [TaskController::class, 'status'])->name('status');
    Route::resource('/', TaskController::class);
    Route::resource('/manage/types', TaskTypeController::class);
    Route::resource('/attachments', TaskAttachmentController::class);

  });
  Route::get('employee-leave', [EmployeeLeaveController::class, 'index'])->name('employee-leave');
  Route::post('employee-leave', [EmployeeLeaveController::class, 'store']);
  Route::put('employee-leave', [EmployeeLeaveController::class, 'update']);
  Route::delete('employee-leave', [EmployeeLeaveController::class, 'destroy'])->name('leave.destroy');

  Route::get('jobs', [BackendJobController::class, 'index'])->name('jobs');
  Route::post('jobs', [BackendJobController::class, 'store']);
  Route::get('job-applicants', [BackendJobController::class, 'applicants'])->name('job-applicants');
  Route::post('download-cv', [BackendJobController::class, 'downloadCv'])->name('download-cv');

  Route::get('goal-type', [GoalTypeController::class, 'index'])->name('goal-type');
  Route::post('goal-type', [GoalTypeController::class, 'store']);
  Route::put('goal-type', [GoalTypeController::class, 'update']);
  Route::delete('goal-type', [GoalTypeController::class, 'destroy']);

  Route::get('goal-tracking', [GoalController::class, 'index'])->name('goal-tracking');
  Route::post('goal-tracking', [GoalController::class, 'store']);
  Route::put('goal-tracking', [GoalController::class, 'update']);
  Route::delete('goal-tracking', [GoalController::class, 'destroy']);

  Route::get('asset', [AssetController::class, 'index'])->name('assets');
  Route::post('asset', [AssetController::class, 'store']);
  Route::put('asset', [AssetController::class, 'update']);
  Route::delete('asset', [AssetController::class, 'destroy']);


});
