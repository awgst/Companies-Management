@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Company') }}</div>

                <div class="card-body">
                    <form action="{{ url('company') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Company</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" placeholder="Nama Perusahaan" id="inputName" name="name" required value="{{ old('name') }}">
                        @error('name')
                          <div class="text-danger">
                              {{ $message }}
                          </div>          
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control @error('website') is-invalid @enderror" placeholder="Email Perusahaan" id="exampleInputEmail1" name="email" required value="{{ old('email') }}">
                        @error('email')
                          <div class="text-danger">
                              {{ $message }}
                          </div>         
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="inputWebsite" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" placeholder="Website Perusahaan" id="inputWebsite" name="website" required value="{{ old('website') }}">
                        @error('website')
                          <div class="text-danger">
                              {{ $message }}
                          </div>                  
                        @enderror
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column w-100 my-auto">
                                <label for="inputLogo" class="form-label">Logo</label>
                                <input type="file" class="form-" id="inputLogo" name="logo" accept="image/png" required>
                                <label class="text-muted">Ukuran maksimal 2 MB. Minimal 100x100px</label>
                                @error('logo')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>         
                                @enderror    
                            </div>    
                            <div class="img-upload" style="max-width: 150px; max-height: 150px;">
                                <img src="" class="w-100 h-100" id="img-box">    
                            </div>
                        </div>
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
        alert('Data Perusahaan berhasil ditambahkan!');
    </script>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#inputLogo').change(function(input){
            let file = input.target.files;
            let reader = new FileReader();
            reader.onload = function(e){
                $('#img-box').attr('src',e.target.result);
            }
            reader.readAsDataURL(file[0]);
        });
    });
</script>
@endsection
