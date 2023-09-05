@props(['name', 'phone', 'address'])

<footer class="footer {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">

    <div class="container">
        <div class="footer-grid">
            <div class="grid-1 xm:col-span-2">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo/bangladesh.png'))) }}"
                    alt="republic of bangladesh" width="100" height="100">
                <p>{{ __("Government of the People's Republic of Bangladesh") }}</p>
            </div>

            <div class="grid-2 xm:col-span-3">
                <h4>{{ __('Useful Links') }}</h4>
                <ul class="arrow">
                    <li><a href="http://https//motj.gov.bd/"
                            target="_blank">{{ __('Ministry of Textile and Jute') }}</a>
                    </li>
                    <li><a href="http://www.dot.gov.bd/" target="_blank">{{ __('Department of Textiles') }}</a></li>
                    <li><a href="http://bteb.gov.bd/"
                            target="_blank">{{ __('Bangladesh Technical Education Board (BTEB)') }}</a>
                    </li>
                    <li><a href="http://dinajpur.gov.bd/"
                            target="_blank">{{ __('District Administration, Dinajpur') }}</a></li>
                    <li><a href="http://zpdinajpur.gov.bd/" target="_blank">{{ __('Zilla Parishad, Dinajpur') }}</a>
                    </li>
                </ul>
            </div>


            <div class="grid-2 xm:col-span-2">
                <h4>{{ __('Quick Links') }}</h4>
                <ul class="arrow">
                    <li><a href="{{ route('history') }}">{{ __('History') }}</a></li>
                    <li><a href="{{ route('admission') }}">{{ __('Admission') }}</a></li>
                    <li><a href="{{ route('stipend') }}">{{ __('Stipend') }}</a></li>
                    <li><a href="https://database.dtec.edu.bd/student-form"
                            target="_blank">{{ __('Student Database') }}</a></li>
                    <li><a href="#">{{ __('Web mail') }}</a></li>
                </ul>
            </div>


            <div class="grid-contact xm:col-span-2">
                <h4>{{ __('Contact') }}</h4>
                <p>{{ $name }}</p>
                <p>{{ __($address) }}</p>
                <p>{{ __('Phone') }}: <a href="tel:{{ $phone }}">{{ $phone }}</a></p>
            </div>
        </div>
    </div>


    <div class="credits">
        <div class="flex justify-center md:justify-between md:flex-row items-center md:items-start flex-col container">
            <p class="text-sm ">© {{ date('Y') }} Copyright Textile Institute Dinajpur</p>
            <p class="text-sm ">Powered by: <a href="https://codebumble.net" target="_blank" rel="dofollow"
                    class="transition-all underline decoration-transparent hover:decoration-gray-400 underline-offset-4 text-sm">Codebumble
                    Inc.</a>
            </p>
        </div>

    </div>
</footer>
