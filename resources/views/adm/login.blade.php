<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de administración</title>
    
    <link rel="icon" type="image/png" href="{{ asset($favicon->ruta) }}"/>

    <link rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="logo-login">
                    <img class="responsive-img" src="{{ asset($logohead->ruta) }}" alt="">
                </div>
                {!!Form::open(['route'=>'usuario.authentificate', 'method'=>'POST', 'class' => 'col s12'])!!}
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">face</i>
                            {!!Form::text('username',null,['class'=>'validate'])!!}
                            {!!Form::label('Usuario')!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">https</i>
                            {!!Form::password('password',['class'=>'validate'])!!}
                            {!!Form::label('Contraseña')!!}
                        </div>
                    </div>

                    <a class="waves-effect waves-light btn btn-login right" style="padding: 0;"><input type="submit" value="Ingresar" style="width: 100%; height: 100%; padding: 0 2rem;"><a/>
                {!!Form::close()!!}
            </div>
        </div>
    </main>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Materialize Core JavaScript -->
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
</body>

</html>
