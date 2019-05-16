<header>

  <div class="row header_private" style="padding: 0px 7%;display:  flex;align-items:  center;justify-content: flex-end;">

    <div style="float: right; display: flex; align-items: center;">

      <a style="color: black;" class="modal-trigger" href="#modal1">ZONA PRIVADA</a>

    </div>

  </div>

   <nav class="header" style="position: relative;">

    <div class="nav-wrapper" style="display: flex; justify-content:  space-between; width:  100%; position: relative; padding: 0px 5%;">

      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons li-ppal">menu</i></a>

      <div class="hide"><a href="{{route('index')}}" class="brand-logo"><img class="responsive-img logo" src="{{asset($logohead->ruta)}}" alt=""></a></div>

      <div id="nav-mobile" class="left hide-on-med-and-down" style="display:  flex; justify-content: space-around; width:  100%;">

        <div style="width: 30%; display: flex;justify-content: center;align-items: center; position: relative !important; "><a href="{{route('index')}}" class="brand-logo"><img class="responsive-img logo" src="{{asset('img/logos/header1.png')}}" alt=""></a></div>

        

        <div>

          

        @foreach($redes as $red)

          @if($red->ubicacion==='header')

            <div class="li-red" style="padding-top: 10px;">

              <a href="{{ $red->link }}">

                <img src="{{asset($red->logo)}}" alt="">

              </a>

            </div>

          @endif

        @endforeach

        </div>

       



      </div>

      <ul class="side-nav" id="mobile-demo">



      </ul>

    </div>

  </nav>

</header>

<div id="modal1" class="modal">

    <div class="modal-content">

      <h5>Accede a la zona privada</h5>

     {!! Form::open([ 'route' => 'usuario.store_privado', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true ])!!}

            {{ csrf_field() }}

      <div class="row">

        <div class="input-field col s6">

          <input id="usuario" type="text" class="validate">

          <label for="usuario">Usuario</label>

        </div>

        <div class="input-field col s6">

          <input id="password" type="password" class="validate">

          <label for="password">Contraseña</label>

        </div>

      </div>

      

    

    </div>

    <div class="modal-footer">

      <div class="col s12 no-padding">

          {!!Form::submit('Ingresar', ['class'=>'waves-effect waves-light btn right'])!!}

        </div>

      <a href="#modal2" id="click_modal" class="modal-trigger modal-action waves-effect waves-red btn-flat ">Crear cuenta</a>

    </div></form>

  </div>

  <div id="modal2" class="modal">

    <div class="modal-content">

      <h5>Crea cuenta en la zona privada</h5>

      {!!Form::model(['route'=>['usuario.store_privado'], 'method'=>'POST', 'files' => true])!!}



      <div class="row">

        <div class="input-field col s6">

          <input id="nombre" type="text" class="validate" required>

          <label for="nombre">Nombre</label>

        </div>

        <div class="input-field col s6">

          <input id="apellido" type="text" class="validate" required>

          <label for="apellido">Apellido</label>

        </div>

        <div class="input-field col s6">

          <input id="usuario" type="text" class="validate" required>

          <label for="usuario">Usuario</label>

        </div>

        <div class="input-field col s6">

          <input id="password" type="password" class="validate" required>

          <label for="password">Contraseña</label>

        </div>

        <div class="col s12 no-padding">

          {!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}

        </div>

      </div>

    </form>

    </div>

  </div>

  <script>

    $(document).ready(function(){

    $('#modal1').modal();

    $('#modal2').modal();

  });

  </script>