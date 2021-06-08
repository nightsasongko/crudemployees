<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use App\Models\Employees;
use App\EmployeeId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    
    public function index()
    {
        $departements = Departement::pluck("departement_name","id");
        // var_dump($departements);die;

        $employeesdepartement = DB::table('employees')
        ->join('departements', 'employees.departement_id', '=', 'departements.id')
        ->select('employees.*', 'departements.departement_name')
        ->get();
        // var_dump($employeesdepartement);die;

        $employees = Employees::latest()->paginate(5);
        return view('employees.index',[
            'departements' => $departements], compact('employees','employeesdepartement'))
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

    public function show($id)
    {
        // $departements = Departement::pluck("departement_name","id");
        $employeesid = EmployeesId::all();
        // var_dump($employeesid);die;

        $employees = Employees::find($id);
        return view('employees.detail', [
            'employeesid' => $employeesid,
        ], compact('employees'));
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
}
