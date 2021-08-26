@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('/company/create') }}" class="btn btn-primary mx-2 mb-2">Tambah</a>
                    </div>
                    <div class="list-group mb-2">
                      @foreach($companies as $company)
                      <div class="list-group-item list-group-item-action mb-2">
                        <div class="d-flex">
                            <div class="logo" style="width: 100px;height: 100px">
                                <img class="img-fluid" src="{{ url($company->logo) }}"></img>
                            </div>
                            <div class="description w-100 mx-3">
                                <div class="d-flex w-100 justify-content-between">
                                  <a href="{{ url('company/'.$company->id) }}" class="text-decoration-none text-dark"><h5 class="mb-1">{{ $company->name }}</h5></a>
                                  <small>
                                    <a href="{{ url('company/'.$company->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger">Hapus</button>
                                  </small>
                                </div>
                                <h5 class="mb-1"></h5>
                                <p class="mb-1">{{ $company->email }}</p>
                                <small class="text-muted">{{ $company->website }}</small>        
                            </div>
                        </div>
                      </div>
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
