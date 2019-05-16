<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>@yield('titulo')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}">

    <link rel="icon" type="image/png" href="{{asset($favicon->ruta)}}"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="keywords" content="{{ $metadatos->keywords }}">

    <meta name="description" content="{{ $metadatos->description }}">

    <script src="{{ asset('plugins/materialize/js/jquery.min.js') }}"></script>

    <!-- Materialize Core JavaScript -->

    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>



    <!--Estilos propios-->

    <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

    @yield('estilo')

    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
</head>

<body>

    @include('pages.templates.header')

        <main>@yield('paginas')</main>

    @include('pages.templates.footer')

    <script>

        $(".button-collapse").sideNav()

    </script>

    <script>

        $('.carousel.carousel-slider').carousel({fullWidth: true});

    </script>



<!--End of Tawk.to Script-->
</body>

</html>
