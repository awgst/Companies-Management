@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $company->name }}</div>

                <div class="card-body">
                    <div class="list-group mb-2">
                      @foreach($employees as $employee)
                      <a href="#" class="list-group-item list-group-item-action mb-2">
                            <h5 class="mb-1">{{ $employee->name }}</h5>
                            <p class="mb-1">{{ $employee->email }}</p>    
                      </a>
                      @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
