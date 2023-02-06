@extends('layouts/fullLayoutClient')

@section('content')
    <x-header />


    <section>
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-6">

                <div class="col-span-3">

                    @yield('main-content')

                </div> {{-- End of main content --}

                {{-- Aside/Left bar --}}
                <x-aside />
            </div>
        </div>
    </section>


    <x-footer />


@stop
