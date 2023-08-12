@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Not Authorized')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-misc.css')) }}">
@endsection

@section('content')
    <!-- Not authorized-->
    <div class="misc-wrapper">
        <div class="misc-inner p-2 p-sm-3">
            <div class="w-100 text-center">
                <h2 class="mb-1">403</h2>
                <h2 class="mb-1">You are not authorized! 🔐</h2>
                <p class="mb-2">We apologize for making you unauthorized to access this content. If you believe this is a
                    mistake, please contact our support team for assistance.</p>
                <a class="btn btn-primary mb-1 btn-sm-block" href="{{ route('home') }}">Back to Home</a>
            </div>
        </div>
    </div>
    <!-- / Not authorized-->
    </section>
    <!-- maintenance end -->
@endsection
