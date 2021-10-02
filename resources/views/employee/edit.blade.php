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
                <form action="/employees/{{$emp->id}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" placeholder="Enter Name" name="name" value="{{$emp->name}}">
                              @error('name')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" placeholder="Enter Email" name="email" value="{{$emp->email}}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select class="form-control" id="company_id" name="company_id">
                                 @foreach ($coms as $com)
                                     <option value="{{$com->id}}" @if ($com->id==$emp->company_id)
                                         selected
                                     @endif>{{$com->name}}</option>
                                 @endforeach
                                </select>
                            </div>
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
@endsection