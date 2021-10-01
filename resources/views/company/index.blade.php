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
                <a href="/company/create" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus"></i> Add Company</a>
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
                            @foreach ($coms as $com)
                            <tr>
                                <td>{{$com->id}}</td>
                                <td>{{$com->name}}</td>
                                <td>{{$com->email}}</td>
                                <td><img src="{{asset('images/'.$com->logo)}}" alt"{{$com->name}}" width="100px"></td>
                                <td>{{$com->website}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{$coms->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection