<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $judul ?? 'Judul' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        <x-navbar></x-navbar>

        <div class="row py-4">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('data.barang') }}" class="list-group-item list-group-item-action {{ request()->is('data-barang/barang') ? 'active' : '' }} ">Data Barang</a>
                    <a href="{{ route('data.pesanan') }}" class="list-group-item list-group-item-action">Data Pesanan Pembeli</a>
                </div>
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
