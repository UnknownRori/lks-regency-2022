<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/Logo.png') }}" type="image/x-icon">
    <title>{{ $title }}</title>
</head>

<body>
    <x-navbar>
        <x-slot name="title">
            {{ $title }}
        </x-slot>
    </x-navbar>

    <x-msgbar></x-msgbar>

    <main id="app" style="min-height: 90vh;" class="{{ isset($class) ? $class : '' }}">
        {{ $content }}
    </main>

    <x-footer>
        <x-slot name="title">
            {{ $title }}
        </x-slot>
    </x-footer>
</body>

</html>
