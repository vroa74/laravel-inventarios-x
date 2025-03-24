@extends('errors::minimal')

@section('title', 'Página No Encontrada')
@section('code', '404')
@section('message', 'Oops! No pudimos encontrar la página que buscas.')

@section('extra_styles')
    <style>
        /* Posicionar la imagen en la parte inferior izquierda */
        #background {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 700px; /* Ajusta el tamaño */
            height: auto;
            opacity: 0.4; /* Controlar visibilidad */
            z-index: -1; /* Mantener en el fondo */
            user-select: none; /* Evita selección */
            pointer-events: none; /* Evita interacción */
        }

        /* Asegurar que el contenido principal sea legible */
        .content {
            position: relative;
            z-index: 10; /* Trae el texto al frente */
            text-align: center;
            color: #2d3748; /* Ajustar color */
        }

        /* Texto animado */
        .animated-text {
            font-size: 20px;
            color: red;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
@endsection

@section('extra_content')
    <div class="container fh5co-container">

        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeIn">
                <div class="fh5co-404-wrap" id="video" data-vide-bg="video/vbg1" data-vide-options="position: 0 50%">
                    <div class="overlay500"></div>
                </div>
            </div>
            <div class="col-md-12 text-center fh5co-404-text animate-box"  data-animate-effect="fadeIn">
                <h2>Parece que te perdiste</h2>
                <p><a href="{{ url('/') }}" class="btn btn-primary">Regresa al inicio</a></p>
            </div>
            <div class="col-md-12 text-center fh5co-copyright animate-box" data-animate-effect="fadeInUp">
                <p><small>&copy; Derechos Reservados al  Diseñador por Vroa74</p>ani
            </div>
        </div>
    </div>

@endsection

@section('extra_scripts')
    <script>
        console.log("Error 404 detectado - Página no encontrada.");
    </script>
@endsection
