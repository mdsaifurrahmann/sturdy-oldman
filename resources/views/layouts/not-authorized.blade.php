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
                    mistake, please contact our <a href="mailto:hello@codebumble.net">support team</a> for assistance.</p>

                <div class="d-flex align-items-center justify-content-center">
                    <a class="btn btn-primary mb-1 btn-sm-block" href="{{ route('home') }}">Back to Home</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mb-1 btn-sm-block ms-2">Logout</button>
                    </form>
                </div>
                <p>Proudly Powered By: <a href="https://codebumble.net">Codebumble Inc.</a></p>


            </div>
        </div>
    </div>
    <!-- / Not authorized-->
    </section>
    <!-- maintenance end -->
@endsection
