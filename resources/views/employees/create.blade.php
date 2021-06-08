@extends('employees.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Employees
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
            <form method="post" action="{{ route('employees.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>                    
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" >                
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>                    
                    <input type="number" name="telepon" class="form-control" id="telepon" aria-describedby="telepon" >                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>                    
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" >                
                </div>
                <div class="form-group">
                    <label for="departement">Pilih Departement</label>   
                    <select name="departement_id" id="departement_id">
                        <option value="">--- Select Departement ---</option>
                        @foreach ($departements as $id => $departement_name)
                        <option value="{{ $id }}">{{ $departement_name }}</option>
                        @endforeach
                    </select>                            
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>


@endsection