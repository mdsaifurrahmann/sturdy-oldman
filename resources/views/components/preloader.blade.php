@section('preloaderStyle')
    <style>
        .book {
            --color: rgb(251 191 36);
            --duration: 6.8s;
            width: 32px;
            height: 12px;
            position: relative;
            margin: 32px 0 0 0;
            zoom: 1.5;
        }

        .book .inner {
            width: 32px;
            height: 12px;
            position: relative;
            transform-origin: 2px 2px;
            transform: rotateZ(-90deg);
            animation: book var(--duration) ease infinite;
        }

        .book .inner .left,
        .book .inner .right {
            width: 60px;
            height: 4px;
            top: 0;
            border-radius: 2px;
            background: var(--color);
            position: absolute;
        }

        .book .inner .left:before,
        .book .inner .right:before {
            content: '';
            width: 48px;
            height: 4px;
            border-radius: 2px;
            background: inherit;
            position: absolute;
            top: -10px;
            left: 6px;
        }

        .book .inner .left {
            right: 28px;
            transform-origin: 58px 2px;
            transform: rotateZ(90deg);
            animation: left var(--duration) ease infinite;
        }

        .book .inner .right {
            left: 28px;
            transform-origin: 2px 2px;
            transform: rotateZ(-90deg);
            animation: right var(--duration) ease infinite;
        }

        .book .inner .middle {
            width: 32px;
            height: 12px;
            border: 4px solid var(--color);
            border-top: 0;
            border-radius: 0 0 9px 9px;
            transform: translateY(2px);
        }

        .book ul {
            margin: 0;
            padding: 0;
            list-style: none;
            position: absolute;
            left: 50%;
            top: 0;
        }

        .book ul li {
            height: 4px;
            border-radius: 2px;
            transform-origin: 100% 2px;
            width: 48px;
            right: 0;
            top: -10px;
            position: absolute;
            background: var(--color);
            transform: rotateZ(0deg) translateX(-18px);
            animation-duration: var(--duration);
            animation-timing-function: ease;
            animation-iteration-count: infinite;
        }

        .book ul li:nth-child(0) {
            animation-name: page-0;
        }

        .book ul li:nth-child(1) {
            animation-name: page-1;
        }

        .book ul li:nth-child(2) {
            animation-name: page-2;
        }

        .book ul li:nth-child(3) {
            animation-name: page-3;
        }

        .book ul li:nth-child(4) {
            animation-name: page-4;
        }

        .book ul li:nth-child(5) {
            animation-name: page-5;
        }

        .book ul li:nth-child(6) {
            animation-name: page-6;
        }

        .book ul li:nth-child(7) {
            animation-name: page-7;
        }

        .book ul li:nth-child(8) {
            animation-name: page-8;
        }

        .book ul li:nth-child(9) {
            animation-name: page-9;
        }

        @keyframes page-0 {
            4% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            13%,
            54% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            63% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-1 {
            5.86% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            14.74%,
            55.86% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            64.74% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-2 {
            7.72% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            16.48%,
            57.72% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            66.48% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-3 {
            9.58% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            18.22%,
            59.58% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            68.22% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-4 {
            11.44% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            19.96%,
            61.44% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            69.96% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-5 {
            13.3% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            21.7%,
            63.3% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            71.7% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-6 {
            15.16% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            23.44%,
            65.16% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            73.44% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-7 {
            17.02% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            25.18%,
            67.02% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            75.18% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-8 {
            18.88% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            26.92%,
            68.88% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            76.92% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-9 {
            20.74% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            28.66%,
            70.74% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            78.66% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes left {
            4% {
                transform: rotateZ(90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
            }

            46%,
            54% {
                transform: rotateZ(90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
            }

            96% {
                transform: rotateZ(90deg);
            }
        }

        @keyframes right {
            4% {
                transform: rotateZ(-90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
            }

            46%,
            54% {
                transform: rotateZ(-90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
            }

            96% {
                transform: rotateZ(-90deg);
            }
        }

        @keyframes book {
            4% {
                transform: rotateZ(-90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
                transform-origin: 2px 2px;
            }

            40.01%,
            59.99% {
                transform-origin: 30px 2px;
            }

            46%,
            54% {
                transform: rotateZ(90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
                transform-origin: 2px 2px;
            }

            96% {
                transform: rotateZ(-90deg);
            }
        }

        .preloader {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(241 245 249);
            opacity: 1;
            transition: opacity 0.5s ease;
            overflow: hidden;
            flex-direction: column;
            position: fixed;
            width: 100vw;
            z-index: 11111;
        }
    </style>
@stop


<div class="preloader" id="preloader">
    <div class="book">
        <div class="inner">
            <div class="left"></div>
            <div class="middle"></div>
            <div class="right"></div>
        </div>
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <h2 class="text-2xl text-amber-400 mt-8">{{ env('APP_NAME') }}</h2>
</div>


@section('preloaderScript')
    <script>
        $(window).on("load", function() {
            var preloader = $("#preloader");
            preloader.fadeOut(500);
            preloader.remove();
        });
    </script>
@stop
