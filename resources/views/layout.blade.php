<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>тестовое задание</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/vuejs-datepicker/dist/locale/translations/ru.js"></script>
    <script src="https://kit.fontawesome.com/bf05fd6411.js"></script>

</head>
<body>
<div>
    <header class="header">
        <div class="container">
            <h1>Сервис автомобилей</h1>
        </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
