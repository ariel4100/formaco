<header>
  <div class="row header_private" style="padding: 0px 7%;">
    <div style="float: left; ">
    <div class="li-red" style="color: #045A9C; margin-left: 10px; padding-left: 10px; border-left: 1px solid #009788;">
          <a style='color: #045A9C;' href="https://wa.me/5491153470592">
              <img src="{{asset('img/logos/whatsapp.png')}}" alt="" style="margin-right: 10px;"> {{$whatsapp}}
          </a>
          
        </div>                   
      @foreach($redes as $red)
          @if($red->ubicacion==='header')
            <div class="li-red responsive_li" style="padding-top: 10px; padding-left: 5px;">
              <a href="{{ $red->link }}">
                <img src="{{asset($red->logo)}}" alt="">
              </a>
            </div>
          @endif
        @endforeach

    </div>
    <div class="right_responsive">
      <a class="style_header_text" href="{{route('buscador-productos')}}"> BUSCADOR DE PRODUCTOS </a>
      <a class="style_header_text barras_header" href="{{route('novedades')}}"> NOVEDADES </a>
      <a class="style_header_text" href="{{route('contacto')}}"> CONTACTO </a>

       <div class="li-red">
            {!!  Form::open(['route' => 'buscar', 'method' => 'POST', 'id'=>'buscador']) !!}
            <input type="search" id="buscar" name="buscar">
            {!! Form::close() !!}
        </div>
    </div>
  </div>
   <nav class="header" style="position: relative;">
    <div class="nav-wrapper content-header">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons li-ppal">menu</i></a>
      <div class="hide"  ><a  href="{{route('index')}}" class="brand-logo" ><img class="responsive-img logo" src="{{asset($logohead->ruta)}}" alt=""></a></div>
      <div id="nav-mobile"  class="left hide-on-med-and-down" style="display:  flex; justify-content: space-around; width:  100%;">
        <div style="width: 30%; margin-left: -3%; display: flex;justify-content: center;align-items: center; position: relative !important; "><a href="{{route('index')}}" class="brand-logo"><img class="responsive-img logo" src="{{asset($logohead->ruta)}}" alt=""></a></div>
        <div class="div-ppal {{ Request::segment(1) === 'empresa' ? 'active-div' : null }}"><a class="li-ppal center-align {{ Request::segment(1) === 'empresa' ? 'active-ppal' : null }}" href="{{route('empresa')}}" style="letter-spacing: 1;">EMPRESA</a></div>
        <div class="div-ppal {{ $active === 'flejes' ||  Request::segment(1) === 'flejes' ? 'active-div' : null }}"><a class="li-ppal center-align {{ $active === 'flejes' ? 'active-ppal' : null }}" href="{{route('flejes')}}" style="letter-spacing: 1;">FLEJES</a></div>
        <div class="div-ppal {{ Request::segment(1) === 'sellos-hebillas' ? 'active-div' : null }}"><a class="li-ppal center-align {{ Request::segment(1) === 'sellos-hebillas' ? 'active-ppal' : null }}" href="{{route('sellos-hebillas')}}" style="letter-spacing: 1;">SELLOS Y HEBILLAS</a></div>

        <div class="div-ppal {{ Request::segment(1) === 'maquinas-herramientas' || $active == 'maquinas-herramientas' ? 'active-div' : null }}"><a class="li-ppal center-align {{ Request::segment(1) === 'maquinas-herramientas' || $active == 'maquinas-herramientas' ? 'active-ppal' : null }}" href="{{route('maquinas-herramientas')}}" style="letter-spacing: 1;">MÁQUINAS Y HERRAMIENTAS</a></div>
        <div class="div-ppal {{ Request::segment(1) === 'sectores' ? 'active-div' : null }}"><a class="li-ppal center-align {{ Request::segment(1) === 'sectores' ? 'active-ppal' : null }}" href="{{url('sectores/subsector/1')}}" style="letter-spacing: 1;">SOLUCIONES POR SECTOR</a></div>

        <div class="div-ppal {{ Request::segment(1) === 'articulos-embalaje' ? 'active-div' : null }}"><a class="li-ppal center-align {{ Request::segment(1) === 'articulos-embalaje' ? 'active-ppal' : null }}" href="{{route('articulos-embalaje')}}" style="letter-spacing: 1;">ARTÍCULOS DE EMBALAJE</a></div>
        <div>
          
        
        
        </div>
       

      </div>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="{{route('empresa')}}">Empresa</a></li>
        <li><a href="{{route('flejes')}}">Flejes</a></li>
        <li><a href="{{route('sellos-hebillas')}}">Sellos y Hebillas</a></li>
        <li><a href="{{route('maquinas-herramientas')}}">Maquinas y herramientas</a></li>
        <li><a href="{{route('sectores',0)}}">Soluciones por sector</a></li>
        <li><a href="{{route('articulos-embalaje')}}">Artículos de embajale</a></li>
        <li><a href="{{route('novedades')}}">Novedades</a></li>
        <li><a  href="{{route('contacto')}}">Contacto</a></li>

      </ul>
    </div>
  </nav>
</header>
<div id="modal1" class="modal">
    <div class="modal-content">
      <h5>Accede a la zona privada</h5>
      {!! Form::open([ 'route' => 'usuario.privado', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true ])!!}
      <div class="row">
        <div class="input-field col s6">
          <input id="username" name="username"  type="text" class="validate">
          <label for="username">Usuario</label>
        </div>
        <div class="input-field col s6">
          <input id="password" name="password"  type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
      </div>
       <div class="col s12 no-padding">
          {!!Form::submit('Ingresar', ['class'=>'waves-effect waves-light btn right'])!!}
        </div>
    </form>
    </div>
    
    <div class="modal-footer">
     
      <a href="#modal2" id="click_modal" class="modal-trigger modal-action waves-effect waves-red btn-flat ">Crear cuenta</a>
    </div>
  
  </div>
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h5>Crea cuenta en la zona privada</h5>
    {!! Form::open([ 'route' => 'usuario.store_privado', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true ])!!}
            {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <input id="nombre" name="nombre" type="text" class="validate" required>
          <label for="nombre">Nombre</label>
        </div>
        <div class="input-field col s6">
          <input id="apellido"  name="apellido" type="text" class="validate" required>
          <label for="apellido">Apellido</label>
        </div>
        <div class="input-field col s6">
          <input id="username"  name="username" type="text" class="validate" required>
          <label for="username">Usuario</label>
        </div>
        <div class="input-field col s6">
          <input id="password" name="password" type="password" class="validate" required>
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