@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $employee->name }}</div>
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center">
                        <h5>{{ $employee->name }}</h5>
                        <small class="d-flex">
                            <p class="mx-2">{{ $employee->email }}</p>
                            <p class="mx-2">Bekerja di {{ $employee->company->name }}</p>
                        </small>
                        <small class="d-flex justify-content-center">
                                <a href="{{ url('/employee/'.$employee->id.'/edit') }}" class="btn btn-success mx-1">Edit</a>
                                <form action="{{ url('/employee/'.$employee->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mx-1">Hapus</button>
                                </form>
                              </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
