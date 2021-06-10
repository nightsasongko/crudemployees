<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('index', compact('employees'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $departments = Department::pluck("name","id");

        return view('create', [
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'telephone' => 'required', 
            'email' => 'required', 
            'id_department' => 'required', 
        ]); 

        Employee::create($request->all()); 

        return redirect()->route('index')
            ->with('success', 'Employees created successfully.');
    }

    public function edit($id)
    {
        $departments = Department::pluck("name","id");
        $employees = Employee::find($id);
        return view('employees.edit',[
            'departments' => $departments], compact('employees')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required', 
            'telephone' => 'required', 
            'email' => 'required', 
            'id_department' => 'required', 
        ]);

        Employee::find($id)->update($request->all());

        return redirect()->route('index')
            ->with('success', 'Employees created successfully.'); 
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('index')
            ->with('success', 'Employees Berhasil Dihapus');
    }

    public function department()
    {
        // $employee_de = Department::All();
        $employee_department = Employee::with('department')->get();
        // return $employee_de;
        return view('department.index', compact('employee_department'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
