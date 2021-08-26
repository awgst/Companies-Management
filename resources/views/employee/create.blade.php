@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Karyawan di {{ $company->name }}</div>

                <div class="card-body">
                    <form action="{{ url('employee') }}" method="POST">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                      <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" id="inputName" name="name" required value="{{ old('name') }}">
                        @error('name')
                          <div class="text-danger">
                              {{ $message }}
                          </div>          
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="exampleInputEmail1" name="email" required value="{{ old('email') }}">
                        @error('email')
                          <div class="text-danger">
                              {{ $message }}
                          </div>         
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('status')=='success')
    <script>
        alert('Data Karyawan berhasil ditambahkan!');
    </script>
@endif
@endsection
