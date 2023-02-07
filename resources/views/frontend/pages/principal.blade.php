@extends('layouts.fullLayoutClient')

@section('title', __('Principal'))
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')


@stop

@section('main-content')

    <!-- page title -->

    <div class="card text-center text-gray-800">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('Our Honorable Principal') }}
        </h2>



        <div class="mt-4">
            <img src="{{ asset(mix('images/institute/principal.jpg')) }}" alt="front-view"
                class="rounded w-full h-[400px] object-cover block mx-auto">
            <p class="my-4 text-justify indent-4">
                {{ __('One of the fundamental needs as a human being is clothing. Thus textile industries have been constituting a major part of the industrial society since the very beginning of industrial era. To cope with the ever increasing competitive world of industries, our country has established numerous textile mills reaching the pick of success gaining one of the topmost positions in the third world. But to encourage these industries by building up a young generation as the future pioneers in this sector, different textile engineering colleges and vocational institutions under Ministry of Textile & Jute have been playing an important part. Textile Institute at Pulhat in the district of Dinajpur is among these institutions playing a vital role providing textile education to the people of the northern area of our country. Since 1994 it’s been delivering Diploma degrees to its students. Despite some limitations, with the earnest efforts of the students and teachers jointly, this institute has gained one of the top positions among the northern educational institutes of our country. We hope that these little drawbacks will soon be overcome to deliver better exposure. My greetings to all the concerned stakeholders of this institute.') }}
            </p>


            <p class="text-left block text-gray-600">
                <strong><i>MD. Atiqur Rahman Prodhan</i></strong>
                <i class="block">B.Sc in Textile Engineering</i>
                <i class="block">Principal in Charge</i>
                <i class="block">Textile Institute, Dinajpur</i>
            </p>
        </div>

    </div>




@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
