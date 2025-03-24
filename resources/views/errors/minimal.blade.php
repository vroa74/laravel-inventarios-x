<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <meta name="description" content="web error" />
    <meta name="keywords" content="" />
    <meta name="author" content="vroa74" />

    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <link rel="icon" type="image/png" href="{{ asset('media/img/favicon.png') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('error/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('error/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('error/css/style.css') }}">
    <!-- Modernizr JS -->
    <script src="{{ asset('error/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{ asset('error/js/respond.min.js') }}"></script>
    <![endif]-->



    @yield('extra_styles') <!-- Permite agregar CSS adicional sin errores si está vacío -->
</head>
<body style="background-color: #0a0a0a">

<div class="error-code">@yield('code')</div>
<div class="message">
    @yield('content')

</div>

<!-- Sección opcional para contenido extra -->
<div class="extra-content">
    @yield('extra_content')
</div>

@yield('extra_scripts') <!-- Permite agregar scripts sin errores si está vacío -->

<!-- jQuery -->
<script src="{{ asset('error/js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('error/js/bootstrap.min.js') }}"></script>
<!-- Vide -->
<script src="{{ asset('error/js/jquery.vide.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('error/js/jquery.waypoints.min.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('error/js/main.js') }}"></script>
</body>
</html>
