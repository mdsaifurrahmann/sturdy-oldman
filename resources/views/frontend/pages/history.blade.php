@extends('layouts.fullLayoutClient')

@section('title', __('History'))
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
            {{ __('Textile Institute, Dinajpur in a unique role in technical education:') }}
        </h2>



        <div class="mt-4">
            <img src="{{ asset(mix('images/institute/front_view.jpg')) }}" alt="front-view" class="rounded">
            <p class="my-4 text-justify indent-4">
                {{ __("Between 1911 A.D. and 1913, the British government established 25 Peripatetic Schools and 9
                                                                                                                Weaving Schools in undivided India. and 1929 A.D. to teach Bengalis how to make yarn into
                                                                                                                textiles. District weaving was the name given to the textile schools. In Khulna, one of
                                                                                                                them,
                                                                                                                the current Dinajpur Textile Institute, was founded in 1926 AD. It was moved from Khulna to
                                                                                                                Dinajpur in the academic year 1960–1961, entirely thanks to one of the inventive kids from
                                                                                                                Dinajpur. The former Dinajpur District Weaving School used to offer a one-year vocational
                                                                                                                course. In
                                                                                                                the
                                                                                                                year 1980 AD, the government changed the name of the District Weaving School to District
                                                                                                                Textile
                                                                                                                Institute, abolishing the one-year artisan program and introducing a two-year certificate
                                                                                                                program. Later, a 3-year diploma-in-textile technology The former Dinajpur District Weaving School used to
                                                                                                                offer
                                                                                                                a one-year vocational course. In
                                                                                                                the
                                                                                                                year 1980 AD, the government changed the name of the District Weaving School to District
                                                                                                                Textile
                                                                                                                Institute, abolishing the one-year artisan program and introducing a two-year certificate
                                                                                                                program. Later, a 3-year diploma-in-textile technology course was introduced through a
                                                                                                                development project from the academic year 1993-1994 and the certificate course was
                                                                                                                eliminated
                                                                                                                due to the enormous need for middle-level technicians in textile plants.
                                                                                                
                                                                                                                50 seats were authorized for the specified course. 80 seats were eventually added in phases.
                                                                                                                The
                                                                                                                course's length was increased from three to four years beginning with the 2001–2002 academic
                                                                                                                year, and the name was changed to Diploma in Textile Engineering. The government began
                                                                                                                offering
                                                                                                                the Diploma in Textile Engineering course through a second shift program in the academic
                                                                                                                year
                                                                                                                2004–2005 with 80 seats because to the rising demand for textile ships. The academic year
                                                                                                                2012–2013 has been completed by the students admitted during the second shift. Students were
                                                                                                                thereafter admitted in one shift up until the academic year of 2015–2016. Students are now
                                                                                                                being
                                                                                                                admitted from the current academic year in the first and second shifts. There are 200 seats
                                                                                                                available.") }}
            </p>
        </div>

    </div>




@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
