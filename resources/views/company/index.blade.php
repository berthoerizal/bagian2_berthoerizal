@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="mt-4">{{$title}}</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-10">
                        <form action="/companies/search_company" method="get">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Search here..." aria-label="Search here" aria-describedby="button-addon2" name="search" value="{{ old('search') }}">
                              <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                              </div>
                            </div>
                        </form>
                    </div>
                    <a href="/companies/create" class="btn btn-primary mb-3 ml-3 float-right"><i class="fa fa-plus"></i> Add Company</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coms as $key => $com)
                            <tr>
                                <td>{{ $coms->firstItem() + $key }}.</td>
                                <td>{{$com->name}}</td>
                                <td>{{$com->email}}</td>
                                <td>
                                    <a href="{{asset('images/'.$com->logo)}}" data-lightbox="photos"><img class="img-fluid" src="{{asset('images/'.$com->logo)}}" alt="{{$com->name}}" width="50px"></a>
                                </td>
                                <td>{{$com->website}}</td>
                                <td>
                                    <a class="btn btn-info mb-1" href="/companies/{{$com->id}}/pdf"><i class="fas fa-file-pdf"></i> Export PDF</a>
                                    @include('company.delete_modal')
                                    <a href="/companies/{{$com->id}}/edit" class="btn btn-primary mb-1"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-left">
                        {{$coms->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection