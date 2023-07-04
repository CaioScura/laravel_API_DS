<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSS da Aplicação --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <meta name="theme-color" content="#7952b3">

    <style>
        body {
            min-height: 75rem;
            padding-top: 4.5rem;
        }

        .upper-card{
            margin-bottom: 10px;
        }
    </style>

    <title>Company XXXX</title>
</head>
<body>

    @component('components.navbar')
    @endcomponent

    <main class="container">
        {{-- @yield('bacon') --}}
        @yield('teste')
    </main>

    {{-- JavaScript da Aplicação --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
