@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('content')

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
            <strong>Error!</strong> {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">




        <div class="col-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img src="{{ asset('images/elements/decore-left.png') }}" class="congratulations-img-left"
                        alt="card-img-left" />
                    <img src="{{ asset('images/elements/decore-right.png') }}" class="congratulations-img-right"
                        alt="card-img-right" />
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i data-feather="smile" class="font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">Hello, {{ ucfirst(Auth::user()->name) }}</h1>
                        <p class="card-text m-auto w-75">
                        <blockquote>
                            {{ $randomItem['quote'] }}
                            - {{ $randomItem['author'] }}
                        </blockquote>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-info p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="feather" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder">{{ $primaryArray['notices'] }}</h2>
                    <p class="card-text">Total Notices</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-danger p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="globe" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder">{{ $primaryArray['apas'] }}</h2>
                    <p class="card-text">Total APA Items</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-warning p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="heart" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder">{{ $primaryArray['faculty'] }}</h2>
                    <p class="card-text">Total Faculty Members</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-primary p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder">{{ $primaryArray['users'] }}</h2>
                    <p class="card-text">Total Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-success p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="hard-drive" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder">{{ $primaryArray['machineries'] }}</h2>
                    <p class="card-text">Total Machineries</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-danger p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="folder" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder">{{ $primaryArray['albums'] }}</h2>
                    <p class="card-text">Total Photo Albums</p>
                </div>
            </div>
        </div>
    </div>
@endsection
