<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7fafc;
            color: #4a5568;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .error-code {
            font-size: 80px;
            font-weight: bold;
            color: #2d3748;
        }

        .message {
            font-size: 24px;
            margin-top: 10px;
            color: #718096;
        }

        .extra-content {
            margin-top: 20px;
        }
    </style>

    @yield('extra_styles') <!-- Permite agregar CSS adicional sin errores si está vacío -->
</head>
<body style="background-color: #0a0a0a">

<div class="error-code">@yield('code')</div>
<div class="message">@yield('message')</div>

<!-- Sección opcional para contenido extra -->
<div class="extra-content">
    @yield('extra_content') <!-- Aquí puedes inyectar HTML o dejar vacío sin errores -->
</div>

@yield('extra_scripts') <!-- Permite agregar scripts sin errores si está vacío -->

</body>
</html>
