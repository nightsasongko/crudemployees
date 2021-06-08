<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    
    public function index()
    {
        $departements = Departement::all()->toArray();

        $employees = Employees::latest()->paginate(5);
        return view('employees.index', compact('employees','departements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $departements = Departement::all()->toArray();

        return view('employees.create', compact('departements'));
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

    public function show($id)
    {
        $employees = Employees::find($id);
        return view('employees.detail', compact('employees'));
    }

    public function edit($id)
    {
        $departements = Departement::all()->toArray();

        $employees = Employees::find($id);
        return view('employees.edit', compact('employees', 'departements'));
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
}
