<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Panel de administraci&oacuten - @yield('titulo')</title>



    <link rel="icon" type="image/png" href="{{ asset($favicon->ruta) }}"/>



    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}">



    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin.css') }}"  media="screen,projection"/>



    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body>

    <!-- CABECERA -->

      <header>

      <nav class="top-nav">

        <div class="container">

          <div class="nav-wrapper"><a class="page-title">

            @yield('titulo')

          </a>

          <a class="right" href="{{route('usuario.logout')}}">Cerrar sesi&oacuten</a>

          </div>

        </div>

      </nav>



      <!-- MENÚ -->



      <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>

      <ul id="nav-mobile" class="side-nav fixed">

        <div class="logo"><a id="logo-container" href="" class="brand-logo">

          <img class="responsive-img" src="{{ asset($logohead->ruta) }}" alt="">

        </a></div>

        <li class="no-padding">



          <ul class="collapsible collapsible-accordion">



            <li class="bold"><a class="collapsible-header <?php if(isset($home_seccion)){echo($home_seccion);} ?> waves-effect waves-admin"><i class="material-icons">home</i>Home</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($slider_create)){echo($slider_create);} ?>"><a href="{{route('sliders.create')}}">Crear slider</a></li>

                  <li class="<?php if(isset($slider_edit)){echo($slider_edit);} ?>"><a href="{{route('sliders.index')}}">Editar slider</a></li>

                  <li class="<?php if(isset($producto_edit)){echo($producto_edit);} ?>"><a href="{{route('productos-destacados.index')}}">Editar destacados</a></li>

                  <li class="<?php if(isset($home_edit)){echo($home_edit);} ?>"><a href="{{route('home.index')}}">Editar lineas home</a></li>

                </ul>

              </div>

            </li>



            <li class="bold"><a class="collapsible-header <?php if(isset($contenido_seccion)){echo($contenido_seccion);} ?> waves-effect waves-admin"><i class="material-icons">business</i>Empresa</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($sliderem_create)){echo($sliderem_create);} ?>"><a href="{{route('sliders.create_empresa')}}">Crear slider</a></li>

                  <li class="<?php if(isset($sliderem_edit)){echo($sliderem_edit);} ?>"><a href="{{route('sliders.index_empresa')}}">Editar slider</a></li>

                  <li class="<?php if(isset($contenido_edit)){echo($contenido_edit);} ?>"><a href="{{route('contenido.index')}}">Editar contenido</a></li>

                </ul>

              </div>

            </li>

             <li class="bold"><a class="collapsible-header <?php if(isset($sectores_seccion)){echo($sectores_seccion);} ?> waves-effect waves-admin"><i class="material-icons">cloud_download</i>Sectores</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($sectores_edit)){echo($sectores_edit);} ?>"><a href="{{route('sectores.index')}}">Editar Sectores</a></li>

                  <li class="<?php if(isset($sectores_create)){echo($sectores_create);} ?>"><a href="{{ route('sectores.create')}}">Crear Sectores</a></li>

                   <li class="<?php if(isset($subsectores_edit)){echo($subsectores_edit);} ?>"><a href="{{route('subsectores.index')}}">Editar Subsectores</a></li>

                  <li class="<?php if(isset($subsectores_create)){echo($subsectores_create);} ?>"><a href="{{ route('subsectores.create')}}">Crear Subsectores</a></li>

                </ul>

              </div>

            </li>

            <li class="bold"><a class="collapsible-header <?php if(isset($producto_seccion)){echo($producto_seccion);} ?> waves-effect waves-admin"><i class="material-icons">cloud_download</i>Productos</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($producto_edit)){echo($producto_edit);} ?>"><a href="{{route('producto.index')}}">Editar Familia</a></li>

                  <li class="<?php if(isset($producto_create)){echo($producto_create);} ?>"><a href="{{ route('producto.create')}}">Crear Familia</a></li>

									<li class="<?php if(isset($subproducto_edit)){echo($subproducto_edit);} ?>"><a href="{{route('subproducto.index')}}">Editar Producto</a></li>

                  <li class="<?php if(isset($subproducto_create)){echo($subproducto_create);} ?>"><a href="{{ route('subproducto.create')}}">CrearProducto</a></li>

                </ul>

              </div>

            </li>

            <li class="bold"><a class="collapsible-header <?php if(isset($categorias_seccion)){echo($categorias_seccion);} ?> waves-effect waves-admin"><i class="material-icons">cloud_download</i>Novedades</a>

              <div class="collapsible-body">

                <ul>



                  <li class="<?php if(isset($categorias_edit)){echo($categorias_edit);} ?>"><a href="{{route('categorias.index')}}">Editar Categorias</a></li>

                  <li class="<?php if(isset($categorias_create)){echo($categorias_create);} ?>"><a href="{{route('categorias.create')}}">Crear Categoria</a></li>

                  <li class="<?php if(isset($novedad_edit)){echo($novedad_edit);} ?>"><a href="{{route('novedades.index')}}">Editar Novedad</a></li>

                  <li class="<?php if(isset($novedad_create)){echo($novedad_create);} ?>"><a href="{{route('novedades.create')}}">Crear Novedad</a></li>

                </ul>

              </div>

            </li>

            <li class="bold"><a class="collapsible-header <?php if(isset($buscador_seccion)){echo($buscador_seccion);} ?> waves-effect waves-admin"><i class="material-icons">cloud_download</i>Buscador</a>

              <div class="collapsible-body">

                <ul>



                  <li class="<?php if(isset($buscador_edit)){echo($buscador_edit);} ?>"><a href="{{route('buscadores.index')}}">Editar Buscador</a></li>

                  <li class="<?php if(isset($categorias_create)){echo($buscador_create);} ?>"><a href="{{route('buscadores.create')}}">Crear Buscador</a></li>

                 
                </ul>

              </div>

            </li>


             <li class="bold"><a class="collapsible-header <?php if(isset($logo_seccion)){echo($logo_seccion);} ?> waves-effect waves-admin"><i class="material-icons">palette</i>Logos</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($logo_edit)){echo($logo_edit);} ?>"><a href="{{route('logos.index')}}">Editar logos</a></li>

                </ul>

              </div>

            </li>





            <li class="bold"><a class="collapsible-header <?php if(isset($dato_seccion)){echo($dato_seccion);} ?> waves-effect waves-admin"><i class="material-icons">view_headline</i>Datos de la empresa</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($dato_edit)){echo($dato_edit);} ?>"><a href="{{route('datos.index')}}">Editar datos</a></li>

                </ul>

              </div>

            </li>



            <li class="bold"><a class="collapsible-header <?php if(isset($metadato_seccion)){echo($metadato_seccion);} ?> waves-effect waves-admin"><i class="material-icons">pin_drop</i>Metadatos</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($metadato_edit)){echo($metadato_edit);} ?>"><a href="{{route('metadatos.index')}}">Editar Metadatos</a></li>

                </ul>

              </div>

            </li>

            <li class="bold"><a class="collapsible-header <?php if(isset($redes_seccion)){echo($redes_seccion);} ?> waves-effect waves-admin"><i class="material-icons">remove_red_eye</i>Redes sociales</a>

              <div class="collapsible-body">

                <ul>

                  <li class="<?php if(isset($redes_create)){echo($redes_create);} ?>"><a href="{{route('redes.create')}}">Crear red social</a></li>

                  <li class="<?php if(isset($redes_edit)){echo($redes_edit);} ?>"><a href="{{route('redes.index')}}">Editar red social</a></li>

                </ul>

              </div>

            </li>

            @if(Auth::user())

                @if(Auth::user()->nivel === 'administrador')

              <li class="bold"><a class="collapsible-header <?php if(isset($usuario_seccion)){echo($usuario_seccion);} ?> waves-effect waves-admin"><i class="material-icons">account_circle</i>Usuarios</a>

                <div class="collapsible-body">

                  <ul>

                    <li class="<?php if(isset($usuario_create)){echo($usuario_create);} ?>"><a href="{{route('usuario.create')}}">Crear Usuario</a></li>

                    <li class="<?php if(isset($usuario_edit)){echo($usuario_edit);} ?>"><a href="{{route('usuario.index')}}">Editar Usuario</a></li>

                  </ul>

                </div>

              </li>

               @endif

            @endif

          </ul>



      </ul>

    </header>

    @yield('contenido')

    	</div>

	<!--Import jQuery before materialize.js-->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Materialize Core JavaScript -->

    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>



    <script>

        $(document).ready(function() {

          $('select').material_select();

        });

    </script>





</body>

</html>

