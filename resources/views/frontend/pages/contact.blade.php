@extends('layouts.WideLayoutClient')

@section('title', __('Contact Us'))
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')

    {{--    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">--}}

    <style>
        .ping {
            top: calc(50% - 4px);
        }
    </style>

@stop

@section('main-content')

    <!-- page title -->

    <div class="card text-center text-gray-800">

        <div class="mb-4 grid md:grid-cols-2 overflow-auto md:px-20 gap-8 items-center">
            <div class="text-left">
                <div class="flex items-center relative">
                    <div
                        class="rounded-full h-3.5 w-3.5 bg-amber-400 animate-ping absolute opacity-75 overflow-hidden ping"></div>
                    <h4 class="relative left-6 text-2xl text-gray-800 text-left font-bold my-2">We're located at</h4>
                </div>
                <h4 class="text-lg text-gray-700 text-left font-semibold">Dinajpur</h4>

                <p class="text-gray-700 font-semibold">Pulhat - Uttar Faridpur Gorstan Rd, Dinajpur,
                    Bangladesh</p>
                <p><span class="font-semibold text-gray-700">Phone:</span>: <a href="tel:+8802588817549"
                                                                               class="text-gray-600">+880
                        2588-817549</a> , <a href="tel:+8802588817550"
                                             class="text-gray-600">+880
                        2588-817550</a>
                </p>
                <p><span class="font-semibold text-gray-700">Email:</span> <a href="mailto:info.dtec@yahoo.com"
                                                                              class="text-gray-600">
                        info.dtec@yahoo.com</a></p>
                <p><span class="font-semibold text-gray-700">Website: </span><a href="/" class="text-gray-600">www.dtec.edu.bd</a>
                </p>
            </div>
            <div class="rounded overflow-hidden h-[200px] w-full object-cover">
                <img src="{{asset(mix('images/institute/front_view.jpg'))}}" alt="dti">
            </div>
        </div>

        <div class="my-4">
            <h4 class="text-center text-gray-800 font-bold text-2xl my-4">Let us give you Direction</h4>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14390.876494566817!2d88.638532!3d25.614248!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x543ab46472d6f3f6!2sTextile%20Institute%2C%20Dinajpur!5e0!3m2!1sen!2sus!4v1676142017236!5m2!1sen!2sus"
                class="w-full rounded overflow-hidden" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
