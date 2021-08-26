@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $company->name }}</div>
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center">
                        <div class="logo" style="max-width: 250px; max-height: 250px;">
                            <img class="img-fluid" src="{{ url($company->logo) }}"></img>
                        </div>
                        <h5>{{ $company->name }}</h5>
                        <small class="d-flex">
                            <p class="mx-2">{{ $company->email }}</p>
                            <a target="blank" href="http://www.{{ $company->website }}" class="mx-2 tex-decoration-none">{{ $company->website }}</a>
                        </small>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('/employee/'.$company->id.'/create') }}" class="btn btn-primary mx-2 mb-2">Tambah</a>
                    </div>
                    <div class="list-group mb-2">
                      @foreach($employees as $employee)
                      <div class="list-group-item list-group-item-action mb-2">
                            <div class="d-flex w-100 justify-content-between">
                              <a href="{{ url('employee/'.$employee->id) }}" class="text-decoration-none text-dark"><h5 class="mb-1">{{ $employee->name }}</h5></a>
                              <small class="d-flex">
                                <a href="{{ url('/employee/'.$employee->id.'/edit') }}" class="btn btn-success mx-1">Edit</a>
                                <form action="{{ url('/employee/'.$employee->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mx-1">Hapus</button>
                                </form>
                              </small>
                            </div>
                            <p class="mb-1">{{ $employee->email }}</p>    
                      </div>
                      @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('status')=='add_success')
    <script>
        alert('Data karyawan berhasil ditambah!');
    </script>
@endif
@endsection
