@extends('layouts/gridLayout')

@section('title', 'Home')
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/client/home.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">

@stop

@section('main-content')


    {{-- swiper slider --}}
    <div class="swiper main__slider h-[500px] rounded-lg">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{ asset(mix('images/slider/01.jpg')) }}" alt="slider-1" class="object-cover w-full h-[inherit]">

                <div class="absolute bottom-0 top-[22rem] w-full bg-black bg-opacity-30"></div>
                <div class="absolute top-[22rem]">
                    <div class="p-8">
                        <h1 class="text-xl font-bold text-white">Slider 1</h1>
                        <p class="text-base text-white">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Quisquam, quod.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="{{ asset(mix('images/slider/02.jpg')) }}" alt="slider-1" class="object-cover w-full h-[inherit]">

                <div class="absolute bottom-0 top-[22rem] w-full bg-black bg-opacity-30"></div>
                <div class="absolute top-[22rem]">
                    <div class="p-8">
                        <h1 class="text-xl font-bold text-white">Slider 1</h1>
                        <p class="text-base text-white">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Quisquam, quod.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="{{ asset(mix('images/slider/03.jpg')) }}" alt="slider-1" class="object-cover w-full h-[inherit]">

                <div class="absolute bottom-0 top-[22rem] w-full bg-black bg-opacity-30"></div>
                <div class="absolute top-[22rem]">
                    <div class="p-8">
                        <h1 class="text-xl font-bold text-white">Slider 1</h1>
                        <p class="text-base text-white">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Quisquam, quod.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>


    {{-- Notice Board --}}
    <div class="mb-4 card">
        <h4 class="card__title">Latest Notices:</h4>
        <ul class="flex flex-col justify-center gap-3 md:px-4 arrow">
            <li class="notice-item"><a href="#">BBA in ACT, FIB, MGT, MKT, Level-2, Semester-II, (
                    July-December) Mid
                    Semester Examination-2021 Notice</a></li>
            <li class="notice-item"><a href="#">BBA in ACT, FIB, MGT, MKT, Level-2, Semester-II, (
                    July-December) Mid
                    Semester Examination-2021 Notice</a></li>
            <li class="notice-item"><a href="#">BBA in ACT, FIB, MGT, MKT, Level-2, Semester-II, (
                    July-December) Mid
                    Semester Examination-2021 Notice</a></li>
            <li class="notice-item"><a href="#">BBA in ACT, FIB, MGT, MKT, Level-2, Semester-II, (
                    July-December) Mid
                    Semester Examination-2021 Notice</a></li>
            <li class="notice-item"><a href="#">BBA in ACT, FIB, MGT, MKT, Level-2, Semester-II, (
                    July-December) Mid
                    Semester Examination-2021 Notice</a></li>
        </ul>

        <a href="#" class="btn bg-amber-400 self-end mt-6 text-sm">View
            All Notices</a>
    </div>

    {{-- APA --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="apa-block card">
            <h4 class="title">
                বার্ষিক কর্মসম্পাদন চুক্তি</h4>
            <div class="apa-grid">
                <div class="apa-block-img">
                    <img src="{{ asset(mix('images/apa/apa.png')) }}" alt="apa-1">
                </div>
                <div class=" apa-items">
                    <ul class="flex flex-col gap-1 arrow">
                        <li class="apa-item"><a href="#">এপিএ নির্দেশিকা/পরিপত্র/এপিএ টিম</a></li>
                        <li class="apa-item"><a href="#">বার্ষিক কর্মসম্পাদন চুক্তিসমূহ</a></li>
                        <li class="apa-item"><a href="#">পরিবীক্ষণ ও মূল্যায়ন প্রতিবেদন</a></li>
                        <li class="apa-item"><a href="#">এপিএ এমএস সফটওয়্যার লিংক</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="apa-block card">
            <h4 class="title">
                সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস চার্টার)</h4>
            <div class="apa-grid">
                <div class="apa-block-img">
                    <img src="{{ asset(mix('images/apa/citizen.svg')) }}" alt="apa-1">
                </div>
                <div class="apa-items">
                    <ul class="flex flex-col gap-1 arrow">
                        <li class="apa-item"><a href="#">সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস
                                চার্টার)</a></li>
                        <li class="apa-item"><a href="#">ফোকাল পয়েন্ট কর্মকর্তা/পরিবীক্ষণ কমিটি</a>
                        </li>
                        <li class="apa-item"><a href="#">ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন
                                প্রতিবেদন</a></li>
                        <li class="apa-item"><a href="#">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="apa-block card">
            <h4 class="title">
                জাতীয় শুদ্ধাচার কৌশল</h4>
            <div class="apa-grid">
                <div class="apa-block-img">
                    <img src="{{ asset(mix('images/apa/nis.png')) }}" alt="apa-1">
                </div>
                <div class="apa-items">
                    <ul class="flex flex-col gap-1 arrow">
                        <li class="apa-item"><a href="#">জাতীয় শুদ্ধাচার কৌশল</a></li>
                        <li class="apa-item"><a href="#">কমিটিসমূহ</a></li>
                        <li class="apa-item"><a href="#">কর্মপরিকল্পনা</a></li>
                        <li class="apa-item"><a href="#">প্রতিবেদনসমূহ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="apa-block card">
            <h4 class="title">
                উদ্ভাবনী কার্যক্রম</h4>
            <div class="apa-grid">
                <div class="apa-block-img">
                    <img src="{{ asset(mix('images/apa/idea.svg')) }}" alt="apa-1">
                </div>
                <div class="apa-items">
                    <ul class="flex flex-col gap-1 arrow">
                        <li class="apa-item"><a href="#">প্রজ্ঞাপন/পরিপত্র/নীতিমালা/সংকলন</a></li>
                        <li class="apa-item"><a href="#">ইনোভেশন টিম</a></li>
                        <li class="apa-item"><a href="#">বার্ষিক উদ্ভাবন কর্মপরিকল্পনা</a></li>
                        <li class="apa-item"><a href="#">উদ্ভাবনী প্রকল্পসমূহ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="apa-block card">
            <h4 class="title">
                তথ্য অধিকার</h4>
            <div class="apa-grid">
                <div class="apa-block-img">
                    <img src="{{ asset(mix('images/apa/info.svg')) }}" alt="apa-1">
                </div>
                <div class="apa-items">
                    <ul class="flex flex-col gap-1 arrow">
                        <li class="apa-item"><a href="#">দায়িত্বপ্রাপ্ত কর্মকর্তা ও আপীল
                                কর্তৃপক্ষ</a></li>
                        <li class="apa-item"><a href="#">আবেদন ও আপিল ফরম</a></li>
                        <li class="apa-item"><a href="#">স্বপ্রণোদিতভাবে প্রকাশযোগ্য তথ্য</a></li>
                        <li class="apa-item"><a href="#">আইন/বিধি/কমিটি/নির্দেশিকা</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="apa-block card">
            <h4 class="title">
                অভিযোগ প্রতিকার ব্যবস্থাপনা</h4>
            <div class="apa-grid">
                <div class="apa-block-img">
                    <img src="{{ asset(mix('images/apa/flag.svg')) }}" alt="apa-1">
                </div>
                <div class="apa-items">
                    <ul class="flex flex-col gap-1 arrow">
                        <li class="apa-item"><a href="#">অনিক ও আপিল কর্মকর্তাগণ</a></li>
                        <li class="apa-item"><a href="#">মাসিক/ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন
                                প্রতিবেদন</a></li>
                        <li class="apa-item"><a href="#">অভিযোগ দাখিল (অনলাইনে আবেদন)</a></li>
                        <li class="apa-item"><a href="#">আইন/বিধি/নীতিমালা/পরিপত্র/</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- History --}}
    <div class="history card">
        <h4 class="card__title">
            History:</h4>
        <p>Between 1911 A.D. and 1913, the British government established 25 Peripatetic Schools and 9
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
            program. Later, a 3-year diploma-in-textile technology <a href="#"
                class="text-amber-500 hover:text-amber-600 transition-all font-semibold">Read
                More...</a>

            {{-- The former Dinajpur District Weaving School used to offer a one-year vocational course. In
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
                                available. --}}

        </p>

    </div>


    <div class="machinery card">
        <h4 class="card__title">
            Pieces of Machinery:</h4>
        <div>
            <p>
                Workshop and Laboratory Facilities Diploma-in-Engineering courses are divided into 60
                percent practical and 40 percent theoretical parts. There are workshops and laboratories
                equipped with modern equipment for conducting practical classes. The subject teachers
                conduct the practical classes and the workshops help. Department based workshops and
                laboratories:
            </p>
            <h5 class="my-3 font-semibold text-gray-800">List of Machinery:</h5>
            <ul class="grid grid-cols-1 xs:grid-cols-2 xm:grid-cols-4 gap-3 list-decimal list-inside arrow text-gray-600">
                <li>Construction Shop</li>
                <li>Plumbing Shop</li>
                <li>Material Testing Lab</li>
                <li>Soil Mechanics Lab</li>
                <li>Survey Lab</li>
                <li>Wood shop</li>
            </ul>
        </div>

    </div>


    <div class="message card">
        {{-- <h4 class="card__title">Message From Principal:</h4> --}}
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 justify-center items-center">
            <div class="sm:col-span-1 flex justify-center">
                <img src="{{ asset(mix('images/avatars/8.png')) }}" alt="Principle Says" class="rounded-full">
            </div>

            <div class="sm:col-span-3 flex flex-col">
                <p class="quote indent-8">
                    Workshop and Laboratory Facilities Diploma-in-Engineering courses are divided into 60
                    percent practical and 40 percent theoretical parts. There are workshops and laboratories
                    equipped with modern equipment for conducting practical classes. The subject teachers
                    conduct the practical classes and the workshops help. Department based workshops and</p>
                <p class="block mt-2">
                    <strong><i>Md. Atiqur Rahman</i></strong>
                    <i class="block">Principle</i>
                    <i class="block">Textile Institute Dinajpur</i>
                </p>
            </div>
        </div>

    </div>


@stop


@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
@stop

@section('page-script')
    <script src="{{ asset(mix('js/client/home.js')) }}"></script>
@stop
