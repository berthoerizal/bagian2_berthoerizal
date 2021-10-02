@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="mt-4"><a href="/companies">{{$title}}</a> | {{$sub_title}}</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form action="/companies/{{$com->id}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" placeholder="Enter Name" name="name" value="{{$com->name}}">
                              @error('name')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" placeholder="Enter Email" name="email" value="{{$com->email}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" aria-describedby="website" placeholder="Enter Website" name="website" value="{{$com->website}}">
                                @error('website')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                              </div>

                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" onchange="previewImg()">
                                    <label class="custom-file-label" for="logo">Choose logo</label>
                                </div>
                                @error('logo')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if (!$com->logo)
                            <img src="{{ asset('images/default-image.jpg') }}" alt="" class="img-thumbnail img-preview">
                            @else
                            <img src="{{ asset('images/'.$com->logo) }}" alt="" class="img-thumbnail img-preview">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right mt-3 ml-3">Save</button>
                            <button type="reset" class="btn btn-default float-right mt-3">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImg() {
            const logo = document.querySelector('#logo');
            const logoLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');
    
            logoLabel.textContent = logo.files[0].name;
    
            const fileLogo = new FileReader();
            fileLogo.readAsDataURL(logo.files[0]);
    
            fileLogo.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
      </script>
@endsection