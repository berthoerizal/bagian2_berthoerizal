@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- desktop -->
        <div class="d-md-block d-none">
            <div class="row pt-5 mb-5">
                <div class="col-md-6">
                    <div class="d-flex h-100">
                        <div class="justify-content-center align-self-center">
                            <h2>
                                <strong>{{ $title }}</strong><br />
                                {{$info}}
                            </h2>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/undraw/undraw_quite_town_mg2q.png') }}" width="100%" />
                </div>
            </div>
        </div>

        <!-- handphone -->
        <div class="d-sm-block d-md-none">
            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('images/undraw/undraw_quite_town_mg2q.png') }}" width="100%" />
                </div>
                <div class="col-md-6">
                    <div class="d-flex h-100">
                        <div class="justify-content-center align-self-center">
                            <h2>
                                <strong>{{ $title }}</strong><br />
                                {{$info}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-md-4 mb-2">
                <div class="card h-100">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary">{{ $employee_count }}</h3>
                                    <span><a href="/employees" class="btn btn-light">Employees</a></span>
                                </div>
                                <img src="{{ asset('images/undraw/undraw_Connected_re_lmq2.png') }}" class="float-right img-fluid"
                                    width="30%" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="card h-100">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary">{{ $company_count }}</h3>
                                    <span><a href="/companies" class="btn btn-light">Companies</a></span>
                                </div>
                                <img src="{{ asset('images/undraw/undraw_Building_re_xfcm.png') }}" class="float-right img-fluid"
                                    width="30%" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection