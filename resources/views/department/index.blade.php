@extends('layout')
    
@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="card" style="">
            <div class="card-header">
                Department
            </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>E-mail</th>
                        <th>Department</th>
                    </tr>
                    @foreach ($employee_department as $employ)
                    <tr>
                        <td>{{ $employ->name }}</td>
                        <td>{{ $employ->telephone }}</td>
                        <td>{{ $employ->email }}</td>
                        <td>{{ $employ->department->name }}</td> 
                    </tr>
                    @endforeach

                </table>
        </div>
    </div>

@endsection