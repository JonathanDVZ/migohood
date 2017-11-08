@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">

 @include('partials.slider')
 

    @include('CreateSpace.PreviewSpace.navbar.preview-navbar',['activo2' => 'preview3'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div class="sections">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center nopadding">
                    <h4 class="text-center">Tu Host</h4>
                    <img class="imgHom2" src="{{url('/assets/img/user-logo.svg')}}" alt="">
                    <br>
                    <br>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding">
                    <br>
                    <br>
                    <h4>{{$overview3["name"]}} {{$overview3["lastname"]}}</h4>
                    <span>ES - Entro en Febrero</span>
                    <br>
                    <button class="btn btn-lg" data-toggle="modal" data-target="#contact-host">Contactar Host</button>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 light-border">
            <h3>PRICE INFO</h3>
        </div>
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
                      <img class="img-contact" src="{{$overview3['avatar']}}" alt="">
                      <h3 class="font title-category-2">{{$overview3['name']}}</h3>
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
                        <div class='input-group date' id='datetimepicker5'>
                            <input type='text' class="form-control" placeholder="Inicio" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div class='input-group date' id='datetimepicker4'>
                            <input type='text' class="form-control" placeholder="Fin" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
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
@endsection