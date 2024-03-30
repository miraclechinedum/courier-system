<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Davison Courier') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-ZpdmSqZCeTRzP23WoSdpN5DOxKlM8gDh+D5ZSotRfmRPf+6htSpEx0lqI+f5Jv5jM2UvZjyTj/cVs+9ZyXLh5A==" crossorigin="anonymous" />


    <link href="{{ asset('build/assets/css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/default.css') }}" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <!-- <div class="font-sans text-gray-900 antialiased"> -->
    {{ $slot }}
    <!-- </div> -->

    <!-- Bootstrap JavaScript (optional, if you need Bootstrap features like dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
</body>

</html>