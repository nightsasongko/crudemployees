@extends('employees.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit User
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('employees.update', $employees->id) }}" id="myForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                    <label for="name">Name</label>                    
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{$employees->name}}">                
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>                    
                    <input type="number" name="telepon" class="form-control" id="telepon" aria-describedby="telepon" value="{{$employees->telepon}}">                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>                    
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{$employees->email}}">                
                </div>
                <div class="form-group">
                    <label for="departement_id">departement_id</label>                    
                    <input type="number" name="departement_id" class="form-control" id="departement_id" aria-describedby="departement_id" value="{{$employees->departement_id}}">                
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            @foreach ($departements as $departement)
                <tr>
                <td>{{ $departement['departement_name'] }}</td>
                <td>{{ $departement['id'] }}</td>
                </tr>
            @endforeach

            </div>
        </div>
    </div>
</div>
@endsection