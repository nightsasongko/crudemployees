@extends('layout')
    
@section('content')
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
                <label for="telephone">telephone</label>                    
                <input type="number" name="telephone" class="form-control" id="telephone" aria-describedby="telephone" value="{{$employees->telephone}}">                
            </div>
            <div class="form-group">
                <label for="email">Email</label>                    
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{$employees->email}}">                
            </div>
            <div class="form-group">
                <label for="department">Pilih Department</label>   
                <select name="id_department" id="id_department">
                    <option value="">--- Select Department ---</option>
                    @foreach ($departments as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>                            
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>
@endsection