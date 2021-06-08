@extends('employees.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Laravel 8 CRUD - Manajemen employees</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New employees</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Telepon</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->telepon }}</td>
            <td>{{ $employee->email }}</td>

            
            
            
            <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
   
                    {{-- <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a> --}}
    
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

        
    </table>
    <div class="text-center">
        {!! $employees->links() !!}
    </div>
      
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Departement</th>
        </tr>
        @foreach ($employeesdepartement as $employeedepartement)
        <tr>
            <td>{{ $employeedepartement->name }}</td>
            <td>{{ $employeedepartement->telepon }}</td>
            <td>{{ $employeedepartement->email }}</td>
            <td>{{ $employeedepartement->departement_name }}</td>

            
            
         
        </tr>
        @endforeach

        
    </table>
@endsection