<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page') • {{ '' . $settings->site_name }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @include('flatpickr::components.style')
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />
    @yield('stylesheet')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- TODO: add seo to settings database for just main pages --}}

<body class="antialiased font">
    <x-general.utils.flash-message />
    <div class="flex flex-col h-full min-h-screen bg-brandLighter dark:bg-brandDarker">
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/alpine-methods.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.js') }}"></script>
    @include('flatpickr::components.script')
    @yield('script')
    @stack('scripts')
</body>

</html>
