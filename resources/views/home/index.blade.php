@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- desktop -->
        <div class="d-md-block d-none">
            <div class="row mt-4">
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
                    <img src="{{ asset('images/image2.png') }}" width="100%" />
                </div>
            </div>
        </div>

        <!-- handphone -->
        <div class="d-sm-block d-md-none">
            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('images/image2.png') }}" width="100%" />
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
    </div>
@endsection