@extends('layout')
    
@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="card" style="">
            <div class="card-header">
                Employees
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
                    <th>Telephone</th>
                    <th>E-mail</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->telephone }}</td>
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

        </div>
    </div>
    @include('sweetalert::alert')
@endsection