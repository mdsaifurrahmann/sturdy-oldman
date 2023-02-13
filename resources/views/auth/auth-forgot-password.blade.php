@extends('layouts/fullLayoutMaster')

@section('title', 'Prodigy Forgot Password')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Forgot Password basic -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="{{ route('home') }}" class="brand-logo align-items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="0 0 47.45 47.45" height="38">
                            <defs>
                                <linearGradient id="linear-gradient" x1="11.02" y1="11.1" x2="18.08" y2="15.18"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#7367f0"/>
                                    <stop offset="1" stop-color="#8f85f3"/>
                                </linearGradient>
                                <linearGradient id="New_Gradient_Swatch_1" x1="29.41" y1="11.1" x2="36.44" y2="15.15"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="New_Gradient_Swatch_1-2" x1="11.62" y1="27.69" x2="28.99" y2="37.72"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-2" x1="31.63" y1="7.91" x2="47.45" y2="7.91"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-3" x1="0" y1="7.91" x2="15.82" y2="7.91"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-4" x1="31.63" y1="39.54" x2="47.45" y2="39.54"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-5" x1="0" y1="39.54" x2="15.82" y2="39.54"
                                                xlink:href="#linear-gradient"/>
                            </defs>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">
                                    <path d="M10.47,13.12a4.06,4.06,0,1,1,4.06,4.06A4.05,4.05,0,0,1,10.47,13.12Z"
                                          style="fill:url(#linear-gradient)"/>
                                    <path d="M37,13.12a4.06,4.06,0,1,1-4.06-4A4.06,4.06,0,0,1,37,13.12Z"
                                          style="fill:url(#New_Gradient_Swatch_1)"/>
                                    <path
                                        d="M27.44,37.58C21.5,40.77,14.78,33.81,12.35,28A2,2,0,1,1,16,26.46c1.82,4.37,4.89,5.18,12.12,6.54C28.09,33,34.1,34,27.44,37.58Z"
                                        style="fill:url(#New_Gradient_Swatch_1-2)"/>
                                    <path
                                        d="M45.47,15.82a2,2,0,0,1-2-2V5.93a2,2,0,0,0-2-2H33.61a2,2,0,1,1,0-3.95h7.91a5.94,5.94,0,0,1,5.93,5.93v7.91A2,2,0,0,1,45.47,15.82Z"
                                        style="fill:url(#linear-gradient-2)"/>
                                    <path
                                        d="M2,15.82a2,2,0,0,1-2-2V5.93A5.94,5.94,0,0,1,5.93,0h7.91a2,2,0,1,1,0,4H5.93a2,2,0,0,0-2,2v7.91A2,2,0,0,1,2,15.82Z"
                                        style="fill:url(#linear-gradient-3)"/>
                                    <path
                                        d="M41.52,47.45H33.61a2,2,0,1,1,0-4h7.91a2,2,0,0,0,2-2V33.61a2,2,0,1,1,4,0v7.91A5.94,5.94,0,0,1,41.52,47.45Z"
                                        style="fill:url(#linear-gradient-4)"/>
                                    <path
                                        d="M13.84,47.45H5.93A5.94,5.94,0,0,1,0,41.52V33.61a2,2,0,1,1,4,0v7.91a2,2,0,0,0,2,2h7.91a2,2,0,1,1,0,4Z"
                                        style="fill:url(#linear-gradient-5)"/>
                                </g>
                            </g>
                        </svg>
                        <h2 class="brand-text text-primary ms-1 mb-0">{{ env('APP_NAME') }}</h2>
                    </a>
                    @if (session('status'))
                        <div class="alert alert-info p-1 text-center">
                            {{ session('status') }}
                        </div>
                    @else
                        <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                        <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your
                            password</p>

                        @if ($errors->any())
                            <div class="alert alert-danger py-1">
                                @foreach ($errors->all() as $error)
                                    <div class="fw-bold text-center">{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif


                        <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}"
                              method="POST">
                            @csrf
                            <div class="mb-1">
                                <label for="forgot-password-email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="forgot-password-email" name="email"
                                       placeholder="john@example.com"
                                       aria-describedby="forgot-password-email" tabindex="1" autofocus/>
                            </div>
                            <button class="btn btn-primary w-100" tabindex="2" type="submit">Send reset link</button>
                        </form>
                    @endif

                    <p class="mt-2 text-center">
                        <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
                    </p>
                </div>
            </div>
            <!-- /Forgot Password basic -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/auth-forgot-password.js')) }}"></script>
@endsection
