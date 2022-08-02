<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classess\Mediaable;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "employees";
        $designations = Designation::get();
        $departments = Department::get();
        $employees = Employee::with('department', 'designation')->get();
        return view('backend.employees',
            compact('title', 'designations', 'departments', 'employees'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $title = "employees";
        $designations = Designation::get();
        $departments = Department::get();
        $employees = Employee::with('department', 'designation')->get();
        return view('backend.employees-list',
            compact('title', 'designations', 'departments', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required',
            'salary' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'nullable|max:18',
            'company' => 'required|max:200',
            'avatar' => 'file|image|mimes:jpg,jpeg,png,gif',
            'cv' => 'required|mimes:pdf|max:20000',
            'department' => 'required',
            'designation' => 'required',
        ]);
        $imageName = Null;
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/employees'), $imageName);
        }
        $uuid = IdGenerator::generate(['table' => 'employees', 'field' => 'uuid', 'length' => 7, 'prefix' => 'EMP-']);

        $request->cv = (new Mediaable($request))
            ->moveToDir('employees/cv')
            ->getMediaFromRequestByName('cv')
            ->getMediaNameAfterUpload();

        Employee::create([
            'uuid' => $uuid,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->passwrod,
            'salary' => $request->salary,
            'phone' => $request->phone,
            'cv' => $request->cv,
            'company' => $request->company,
            'department_id' => $request->department,
            'designation_id' => $request->designation,
            'avatar' => $imageName,
        ]);
        return back()->with('success', "Employee has been added");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|max:15',
            'company' => 'required|max:200',
            'avatar' => 'sometimes|file|image|mimes:jpg,jpeg,png,gif',
            'cv' => 'sometimes|mimes:pdf|max:20000',
            'password' => 'sometimes',
            'salary' => 'required|numeric',
            'department' => 'sometimes',
            'designation' => 'sometimes',
        ]);
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/employees'), $imageName);
            $data['avatar'] = $imageName;
        }

        $employee = Employee::find($request->id);
        if ($request->hasFile('cv')) {
            $cv = $employee->cv() ? Storage::disk('public')->delete($employee->cv()) : '';
            $data['cv'] = (new Mediaable($request))
                ->moveToDir('employees/cv') // Directory
                ->getMediaFromRequestByName('cv') // InputName
                ->getMediaNameAfterUpload(); // To Upload
        }
        $data['uuid'] = $employee->uuid;

        $employee->update($data);
        return back()->with('success', "Employee details has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();
        return back()->with('success', "Employee has been deleted");
    }
}
