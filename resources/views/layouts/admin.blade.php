<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="icon" type="image/png" href="{{ asset('media/img/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet">

    <!-- Font Awesome desde CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">

{{-- Banner --}}
@include('components.banner')

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    {{-- Menú de Navegación --}}
{{--    @livewire('navigation-menu')--}}
    @include('layouts.admin.navigation-menu')
    <!-- Page Heading -->
    @yield('header')

    <!-- Page Content -->
    <main>
        @yield('content')  {{-- ✅ Cambio aquí para que funcione con @extends --}}
    </main>
</div>

@stack('modals')
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
