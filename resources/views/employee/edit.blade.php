@extends('dashboard.template.index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Employee</h1>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('employee.update',$employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row col-md-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" value="{{ $employee->nama }}" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" value="{{ $employee->email }}" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company:</strong>
                <select class="form-control" name="company_id">
                        <option>---Pilih Company---</option>
                        @foreach ($companies as $company)
                        <option value="{{$company->id}}" {{ $company->id == $employee->company_id ? 'selected' : '' }} >{{$company->nama}}</option>>
                        @endforeach
        
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

</form>



@endsection