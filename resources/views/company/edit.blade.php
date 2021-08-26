@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $company->name }}</div>

                <div class="card-body">
                    <form action="{{ url('company/'.$company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Company</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Perusahaan" id="inputName" name="name" required value="{{ $company->name }}">
                        @error('name')
                          <div class="text-danger">
                              {{ $message }}
                          </div>          
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Perusahaan" id="exampleInputEmail1" name="email" required value="{{ $company->email }}">
                        @error('email')
                          <div class="text-danger">
                              {{ $message }}
                          </div>         
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="inputWebsite" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" placeholder="Website Perusahaan" id="inputWebsite" name="website" required value="{{ $company->website }}">
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
                                <input type="file" class="form-" id="inputLogo" name="logo" accept="image/png" value="{{ $company->logo }}">
                                <label class="text-muted">Ukuran maksimal 2 MB. Minimal 100x100px</label>
                                @error('logo')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>         
                                @enderror    
                            </div>    
                            <div class="img-upload" style="max-width: 150px; max-height: 150px;">
                                <img src="/{{ $company->logo }}" class="w-100 h-100" id="img-box">    
                            </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
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
