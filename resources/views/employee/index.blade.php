@extends('dashboard.template.index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Employee</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a class="btn btn-success" href="{{ route('employee.create') }}"> Tambah Data</a>
            <a class="btn btn-danger" href="{{ url('export-employee') }}"> Export</a>
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
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Company</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($employees as $employee)
    <tr>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->nama }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->company->nama }}</td>
        <td>
            <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $employees->links() !!}
@endsection