@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding-right">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="item active">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 2" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 3" />
                    </div>
                </div>
                <a href="#carousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a href="#carousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nopadding-left">
            <div class="bootstrap-iso BlueBack">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h4 class="textwhite lilpadding2">$14 Por Noche </h4>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 nopadding">
                        <a href="">
                            <img class="edit2" src="{{url('/assets/img/Icon-Edit-white.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="bootstrap-iso WhiteBack">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <br>
                            <div class="form-group">
                                <span for="chekin">Check-in</span>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input id="chekin" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <br>
                            <div class="form-group">
                                <span for="checkout">Check-out</span>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input id="chekout" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <span for="selectGuest">Invitados</span>
                    <select id="selectGuest" class="selectpicker form-control required">
                        <option>1 Invitado</option>
                        <option>2 Invitado</option>
                        <option>3 Invitado</option>
                        <option>4 Invitado</option>
                        <option>5 Invitado</option>
                    </select>
                    <br>
                    <br>
                    <div class="text-center">
                        <button type="button" class="btn btn-large">Agendala Ahora</button>
                        <br>
                        <p>No se efectuara el cobro aun</p>
                        <button type="button" class="btn btn-large">Guardar en la Lista de Deseos</button>
                        <br>
                        <br>
                        <div class="text-center">
                            <a href=""><img class="lilimg2" src="{{url('/assets/img/Icon-Facebook.png')}}" alt=""></a>
                            <a href=""><img class="lilimg" src="{{url('/assets/img/Icon-Mail.png')}}" alt=""></a>
                            <a href=""><img class="lilimg" src="{{url('/assets/img/Icon-Twitter.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('CreateParking.PreviewParking.navbar.preview-navbar',['activo2' => 'preview3'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 light-border">
            <div class="sections">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <img class="imgHom2" src="{{url('/assets/img/user-logo.svg')}}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-12 nopadding anfitrion-config">
                        <h3>Username</h3>
                        <span>ES - Entro en Febrero de 2007</span>
                        <br>
                        <button class="btn btn-lg" data-toggle="modal" data-target="#contact-host">Contactar Host</button>
                        <br>
                    </div>
                </div> 
                <hr class="black">
            </div>
            <div class="sections">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <img class="imgHom2" src="{{url('/assets/img/user-logo.svg')}}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-12 nopadding anfitrion-config">
                        <h3>Otro usuario</h3>
                        <span>ES - Entro en Febrero de 2007</span>
                        <br>
                        <button class="btn btn-lg" data-toggle="modal" data-target="#contact-host">Contactar Host</button>
                        <br>
                    </div> 
                </div>
               <hr class="black">
            </div>
        </div>
    </div>
</div>

<!-- Modal Contact Host-->
        <div class="modal fade" id="contact-host" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-designe">
              
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12 -col-md-12 col-lg-12 pull-right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 col-xs-12 anfitrion-config text-center">
                      <img class="img-contact" src="{{url('/assets/img/user-logo.svg')}}" alt="">
                      <h3 class="font title-category-2">Pedro</h3>
                  </div>
                  <div class="col-sm-8 col-xs-12 anfitrion-config">
                      <h3>Coanfitriones</h3>
                      <div class="col-sm-6">
                          <span><i class="fa fa-circle-o" aria-hidden="true"></i><a href=""> Fernando</a></span><br>
                          <span><i class="fa fa-circle-o" aria-hidden="true"></i><a href=""> Pedro</a></span>
                      </div>
                  </div>
              </div>
              <div class="row text-center">
                  <div class="col-sm-12 col-xs-12">
                      <h3>¿Cuándo deseas el servicio?</h3>
                  </div>  
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-4 col-xs-6">
                      <select class="form-control">
                          <option>Inicio</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                  </div>
                       <div class="col-sm-4 col-xs-6">
                            <select class="form-control">
                             <option>Fin</option>
                             <option>2</option>
                             <option>3</option>
                             <option>4</option>
                             <option>5</option>
                           </select>
                       </div>
                       <div class="col-sm-2"></div>
              </div>
              <div class="row">
                  <div class="col-sm-12 text-center">
                      <h3>¿Cuantos invitados?</h3>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-8 ">
                      <input type="number" name="bedrooms_number" min="1" max="20" class="form-control" step="1" placeholder="0" value="" required="">
                  </div>
                <div class="col-sm-2"></div>
              </div>
              <div class="row">
                  <div class="col-sm-12 text-center">
                      <h3>Ingresa tu mensaje</h3>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-8 text-center">
                      <textarea class="form-control comment" id="comments" name="comments" placeholder="Comentario" rows="4"></textarea><br>
                  </div>
                  <div class="col-sm-2"></div>
              </div>
              <div class="row">
                  <div class="col-sm-12 text-center">
                      <button type="button" class="btn btn-primary">Enviar</button>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection