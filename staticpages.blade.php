<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'AliveHire')</title>
    @yield('meta')

    <meta name="author" content="AliveHire Team" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="language" content="English" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="icon" href="{{ asset('imagesset/alivehirefavicon.png') }}" type="image/x-icon" />
    <!-- Inside your <head> tag -->

    {{-- Tailwind + Fonts + Plugins --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css" />
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intl-tel-input.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <style>
        /* Completely hide all scrollbars (still scrollable) */
        ::-webkit-scrollbar {
            display: none !important;
        }

        * {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none !important;
            /* Firefox */
        }

        body {
            font-family: 'Merriweather', serif;
            background-color: #0b0f1a;
            overflow-y: auto;
        }

        aside::-webkit-scrollbar {
            display: none !important;
        }

        /* Animation */
        @keyframes slide-from-left {
            0% {
                transform: translateX(-50px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-slide-from-left {
            animation: slide-from-left 0.6s ease-out forwards;
        }

        /* Phone input */
        .iti__country-list {
            background-color: #0a111a !important;
            color: #fff !important;
            border: 1px solid #334155;
            max-height: 200px !important;
            overflow-y: auto !important;
            font-size: 13px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 300px !important;
        }

        .iti__country {
            background-color: transparent !important;
            padding: 6px 10px;
        }

        .iti__country:hover,
        .iti__active {
            background-color: #1e293b !important;
        }

        .iti__selected-flag,
        .iti__flag-container {
            background-color: #1e293b !important;
        }

        .iti--allow-dropdown input {
            background-color: #141e2e;
            color: white;
            border-color: #334155;
        }

        .iti--separate-dial-code .iti__selected-dial-code {
            color: white !important;
        }

        /* Tom Select */
        .tom-select .ts-dropdown {
            background-color: #0a192f;
            color: #ffffff;
            border: 1px solid #00bcd4;
        }

        .tom-select .option:hover {
            background-color: #13202c;
            color: #00ffff;
        }

        .tom-select .ts-control {
            background-color: #0a192f;
            color: #ffffff;
            border-color: #00bcd4;
        }

        /* Blinking cursor for typewriter effect */
        .blinking-cursor {
            font-weight: bold;
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {

            from,
            to {
                opacity: 0
            }

            50% {
                opacity: 1
            }
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: -1;
            animation: shiftingGradient 20s ease-in-out infinite;
            background-size: 400% 400%;
            background-blend-mode: screen;
        }

        @keyframes shiftingGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .resume-float-container {
            display: none;
        }

        @media (min-width: 768px) {
            .resume-float-container {
                display: block;
                animation: floatUpDown 4s ease-in-out infinite;
            }
        }

        .resume-preview {
            border-radius: 12px;
            max-width: 100%;
            transition: transform 0.7s ease;
        }

        @keyframes floatUpDown {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-12px);
            }
        }
    </style>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>


    {{-- Security Protections --}}
    <script>
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());
        document.addEventListener('dragstart', e => e.preventDefault());
        document.addEventListener('keydown', function(e) {
            // Uncomment to block dev tools
            // if ((e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key)) ||
            //     (e.ctrlKey && e.key === 'U') ||
            //     (e.key === 'F12')) {
            //     e.preventDefault();
            // }
        });
    </script>

    {{-- Alpine + Icons + Select --}}
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet" />

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('head')
</head>

<body class="text-white min-h-screen flex flex-col pt-[100px] relative z-0 overflow-x-hidden"
    style="
        background: {{ $theme->color5 ?? 'linear-gradient(160deg, #0b0f1a 0%, #0f1e2e 30%, #0e1c2a 70%, #0b0f1a 100%)' }};
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        font-family: 'Merriweather', serif; /* ← FIXED */
    ">

    {{-- Main Content --}}
    <div class="{{ $isApplyRoute ? 'w-full' : 'flex-1' }} flex flex-col top-[70px] overflow-y-auto"
        style="min-height: calc(100vh - 70px);">
        <main class="flex-1">
            <div x-data x-init="$el.classList.add('animate-slide-from-left')" class="min-h-[300px] opacity-0">
                @yield('content')
            </div>
        </main>
    </div>
    @stack('scripts')

</body>

</html>