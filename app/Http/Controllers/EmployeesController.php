<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Departement;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    
    public function index()
    {
        $employees = Employees::latest()->paginate(5);
        return view('employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $departements = Departement::pluck("departement_name","id");

        return view('employees.create', [
            'departements' => $departements,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'telepon' => 'required', 
            'email' => 'required', 
            'departement_id' => 'required', 
        ]); 

        Employees::create($request->all()); 

        return redirect()->route('employees.index')
            ->with('success', 'Employees created successfully.'); 
    }

    public function edit($id)
    {
        $departements = Departement::pluck("departement_name","id");
        // var_dump($departements);die;

        $employees = Employees::find($id);
        return view('employees.edit',[
            'departements' => $departements], compact('employees')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required', 
            'telepon' => 'required', 
            'email' => 'required', 
            'departement_id' => 'required', 
        ]);

        Employees::find($id)->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employees created successfully.'); 
    }

    public function destroy($id)
    {
        Employees::find($id)->delete();
        return redirect()->route('employees.index')
            ->with('success', 'Employees Berhasil Dihapus');
    }


    public function departement()
    {
        // $employee_department = Department::all();
        $employee_department = Employee::with('departement')->get();
        // return $employee_department;
        return view('departement.index', compact('employee_department'));
    }

    
}
