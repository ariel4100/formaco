

  <footer class="page-footer" style="position: relative;">
      <!-- <div class="chat">
         <i class="material-icons">message</i> <p>CHATEÁ CON NOSOTROS</p>
      </div> -->
      <div class="container-fluid img">

        <div class="row" style="margin-bottom: 0px;">

          

          <div class="col s12 m6 l4">

            <div class="row" style="    margin-top: 20%;">

              <div class="col s12">

                <a href="{{route('index')}}"><img class="responsive-img" src="{{asset($logofoot->ruta)}}"  alt=""></a>

              </div>

            </div>



          </div>
          <div class="col s12 m6 l4" style="margin-top:2%;">

            <h5 class="titulo-footer">SITEMAP</h5>

                <div class="row">
                    <div class="col xs 4 sitemap">
                        <div>
                            <a href="{{route('index')}}" class="texto-footer" >Inicio</a>
                        </div>
                        <div>
                            <a href="{{route('empresa')}}" class="texto-footer" >Empresa</a><br>
                        </div>
                        <div>
                            <a href="{{route('maquinas-herramientas')}}" class="texto-footer" >Máquinas y Herramientas</a><br>
                        </div>     
                        <div>
                            <a href="{{route('flejes')}}" class="texto-footer" >Flejes</a><br>
                        </div>
                        <div>
                            <a href="{{route('articulos-embalaje')}}" class="texto-footer" >Artículos de embalaje</a><br>
                        </div>
                    </div>

                    <div class="col xs 8 sitemap">
                        <div>
                            <a href="{{route('sellos-hebillas')}}" class="texto-footer" >Sellos y hebillas</a>
                        </div>
                        <div>
                            <a href="{{route('sectores',0)}}" class="texto-footer" >Soluciones por sector</a>
                        </div>
                        <div>
                            <a href="{{route('novedades')}}" class="texto-footer" >Novedades</a>
                        </div>
                        <div>
                            <a href="{{route('contacto')}}" class="texto-footer" >Contacto</a>
                        </div>
                    </div>

                </div>

          </div>


          <div class="col s12 m6 l4 padding-in"  style="margin-top:2%;">

              <h5 class="titulo-footer" style="margin-left: 70px;">FORMACO</h5>

              <div class="row" >
                  <div class="col m2">
                    <img src="{{asset('img/generico/ubicacion.png')}}" alt="">
                  </div>
                  <div class="col m10">
                    {{$direccion->descripcion}}
                  </div>
              </div>
              <div class="row">
                    <div class="col m2">
                      <img src="{{asset('img/generico/telefono2.png')}}" alt="">
                    </div>
                    <div class="col m10">
                      {{$telefono->descripcion}}
                    </div>
              </div>
              <div class="row">
                    <div class="col m2">
                      <img src="{{asset('img/generico/mail2.png')}}" alt="">
                    </div>
                    <div class="col m10">
                      {{$mail->descripcion}}
                    </div>
              </div>
          </div>
        </div>
    </div>
  </footer>
