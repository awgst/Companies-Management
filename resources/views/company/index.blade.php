@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>

                <div class="card-body">
                    <div class="list-group mb-2">
                      @foreach($companies as $company)
                      <a href="#" class="list-group-item list-group-item-action mb-2">
                        <div class="d-flex">
                            <div class="logo" style="width: 100px;height: 100px"></div>
                            <div class="description">
                                <h5 class="mb-1">{{ $company->name }}</h5>
                                <p class="mb-1">{{ $company->email }}</p>
                                <small class="text-muted">{{ $company->website }}</small>        
                            </div>
                        </div>
                      </a>
                      @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $companies->links() }}    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
