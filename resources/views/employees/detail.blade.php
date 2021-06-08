@extends('employees.layout')
  
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail Employees
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name: </b>{{$employees->name}}</li>
                    <li class="list-group-item"><b>Telepon: </b>{{$employees->telepon}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$employees->email}}</li>
                    <li class="list-group-item"><b>Departement_id: </b>{{$employees->departement_id}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('employees.index') }}">Kembali</a>

        </div>
    </div>
</div>
@endsection