<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>

</head>
<body>
<div id="app-layout">

    @include('layouts.partial.navigation')
    <hr/>
    <div class="container">
        @include('flash::message')

        {{--
        @if(session()->has('flash_message'))
            <div class="alert alert-info" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        --}}

        @yield('content')
    </div>
    <hr/>
    @include('layouts.partial.footer')
</div>


@yield('scripts')
</body>
</html>

