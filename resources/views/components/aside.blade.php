<div class="col-span-1">

    {{-- Principle --}}
    <div class="!p-6 card principle mt-4 lg:mt-0">
        <div class="flex flex-col justify-center items-center">
            <div class="principle-img">
                <img src="{{ asset('images/principal/' . $principal->pip) }}" alt="principle of dinajpur textile institute">
            </div>
            <div class="principle__info">
                <h4 class="text-lg font-semibold text-gray-800">{{ $principal->principal_name }}</h4>
                <p class="text-gray-500">{{ $principal->position }}</p>
                <p class="text-gray-500">{{ $principal->institute }}</p>
            </div>
        </div>
        <div class="btn__group">
            <a href="#" class="btn__item call">
                Call
            </a>
            <a href="{{ route('principal') }}" class="btn__item details">
                Details
            </a>
        </div>
    </div>

    {{-- E-Service --}}
    <div class="card mb-4">
        <h4 class="card__title">e-Service:</h4>

        <ul class="arrow flex flex-col gap-3">
            <li><a
                    href="http://www.bteb.gov.bd/site/page/a34671e3-a81c-4927-834f-19d6afc41217/%E0%A6%A1%E0%A6%BF%E0%A6%AA%E0%A7%8D%E0%A6%B2%E0%A7%8B%E0%A6%AE%E0%A6%BE-%E0%A6%AA%E0%A6%B0%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A7%9F">Public
                    Exam Result</a></li>
            <li><a href="http://pmis.mopa.gov.bd/">PMIS</a></li>
            <li><a href="http://edutubebd.com/nctb/">E-learning Materials and e-Manuals</a></li>
        </ul>
    </div>


    {{-- Web Mail --}}
    <div class="card mb-4">
        <h4 class="card__title">Webmail</h4>

        <a href="https://dtec.edu.bd/webmail" class="btn bg-amber-400 text-sm justify-center block">Login to Webmail</a>

    </div>

    {{-- useful link --}}
    <div class="card mb-4">
        <h4 class="card__title">Useful Links:</h4>

        <ul class="arrow flex flex-col gap-3">
            <li><a href="http://www.dshe.gov.bd/">Directorate of Secondary and Higher Education</a></li>
            <li><a href="http://www.tmed.gov.bd/">Technical and Madrasah Education Division</a></li>
            <li><a href="http://bteb.gov.bd/">Bangladesh Technical Education Board (BTEB)</a></li>
            <li><a href="http://www.banbeis.gov.bd/">Bangladesh Bureau of Educational Information and Statistics
                    (BANBEIS)</a>
            <li><a
                    href="http://www.shed.gov.bd/site/page/c3d62652-3c47-462e-bc2f-5579400ab76a/%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE-%E0%A6%AC%E0%A7%8B%E0%A6%B0%E0%A7%8D%E0%A6%A1%E0%A6%B8%E0%A6%AE%E0%A7%82%E0%A6%B9-">Secondary
                    and Higher Education Division</a>
            </li>
            <li><a href="https://mopa.gov.bd/">Ministry of Public Administration</a>
            <li><a href="http://www.dot.gov.bd/">Department of Textiles</a>
            <li><a href="http://www.motj.gov.bd/">Ministry of Textiles & Jute</a>
            </li>
        </ul>
    </div>


    {{-- useful link --}}
    <div class="card mb-4">
        <h4 class="card__title">Emergency Hotlines:</h4>

        <img src="{{ asset(mix('images/apa/helpline.jpg')) }}" alt="hotlines" class="mix-blend-multiply">
    </div>


</div>
