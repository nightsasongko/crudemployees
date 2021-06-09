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
        <td>{{ $employ->telepon }}</td>
        <td>{{ $employ->email }}</td>
        <td>{{ $employ->departement->departement_name }}</td> 
    </tr>
    @endforeach

</table>
<div class="float-right my-2">
    <a class="btn btn-primary" href="/employees"> back</a>
</div>