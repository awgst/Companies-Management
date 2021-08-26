@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee') }}</div>

                <div class="card-body">
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
                            <small>Bekerja di {{ $employee->company->name }}</small>    
                      </div>
                      @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $employees->links() }}    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
