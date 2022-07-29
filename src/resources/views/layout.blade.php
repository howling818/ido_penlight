<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Idol Penlight Search</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/datepicker-ja.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
</head>
<body @if (isset($isScroll) && !$isScroll)class="not-scroll"@endif>
    <div id="app">
        <main>
            <div>
            @yield('content')
        </main>
    </div>
    <input type="hidden" id="url" value="{{ url('/') }}">
    <script>
        $(document).on('click', '.move_method', function(e) {
            e.preventDefault(); // does not go through with the link.

            var $this = $(this);
            window.location.href = $this.attr('data-action');
        });
    </script>
</body>
</html>
