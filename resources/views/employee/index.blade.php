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
                <div class="table-responsive">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emps as $emp)
                            <tr>
                                <td>{{$emp->id}}</td>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->company_id}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{$emps->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection