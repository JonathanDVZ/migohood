@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">

    @include('partials.slider')
    
    @include('CreateService.PreviewService.navbar.preview-navbar',['activo2' => 'preview1'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div class="sections">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center nopadding">
                    <br>
                    <img class="imgHom2" src="{{$overview['avatar']}}" alt="">
                    <h4 class="text-center">{{$overview['name']}}</h4>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding">
                    <br>
                    <br>
                    <h3>{{$overview['title']}}</h3>
                    <span>{{$overview['city']}} {{$overview['state']}}, {{$overview['country']}}</span>
                    <br>
                    <br>
                    <br>
                    @if($type[0]['Check'] == 1)
                    <div class="col-sm-2 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Private-Room.png')}}" alt="">
                        <br>
                        <span>{{$type[0]['name']}}</span>
                    </div>
                    @endif
                    @if($type[1]['Check'] == 1)
                    <div class="col-sm-2 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[1]['name']}}</span>
                    </div>
                    @endif
                    @if($type[2]['Check'] == 1)
                    <div class="col-sm-2 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[2]['name']}}</span>
                    </div>
                    @endif
                    @if($type[3]['Check'] == 1)
                    <div class="col-sm-2 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[3]['name']}}</span>
                    </div>
                    @endif
                    @if($type[4]['Check'] == 1)
                    <div class="col-sm-2 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[4]['name']}}</span>
                    </div>
                    @endif
                    <div class="col-sm-2 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Bedroom.png')}}" alt="">
                        <br>
                        <span>{{$type[0]['num_guest_service']}}<span><span>  Invitado(s)<span>

                    </div>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Sobre este servicio</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    @foreach($description as $ds)
                    @if($ds['description_id'] == 8)
                    {{$ds['content']}}
                    @endif
                    @endforeach
                    <br>
                    <a href="" style="font-weight:bolder" data-toggle="modal" data-target="#contact-host">Contactar anfiltrion</a>
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-service/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Itinerario</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                   @foreach($description as $ds)
                    @if($ds['description_id'] == 13)
                    {{$ds['content']}}
                    @endif
                    @endforeach
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-service/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
                </div>
            </div>
                <div class="sections">
                    <hr class="black">
                    <div class="row config-row">
                        <div class="col-sm-3 col-xs-12">
                            <h3 class="font title-category-2">Tiempo por defecto</h3>
                        </div>
                        <div class="col-sm-8 col-xs-10">
                             <span>{{ date('h:i A', strtotime($type[0]['Entry']) )}} - {{date('h:i A', strtotime($type[0]['Until']) )}}</span>   
                        </div>
                        <div class="col-sm-1 col-xs-1">
                            @if($id == $overview['servid']) 
                            <a href="{{url('/create-service/hosting')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                            @endif
                        </div>
                     </div>
                </div>
                <div class="sections">
                    <div class="row config-row">
                        <div class="col-sm-3 col-xs-12">
                            <h3 class="font title-category-2">Tiempo por servicio</h3>
                        </div>
                        <div class="col-sm-8 col-xs-11">
                            <span>{{$type[0]['time_service']}} {{$type[0]['duration']}}</span>
                        </div>
                    </div>
                    <div class="sections">
                        <div class="row config-row">
                            <div class="col-sm-3 col-xs-12">
                                 <h3 class="font title-category-2">Disponibilidad</h3>
                            </div>
                            <div class="col-sm-8 col-xs-8">
                                 <a href="#">Ver Calendario <span class="glyphicon glyphicon-calendar"></span></a>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="sections">
                    <hr class="black">
                    <div class="col-sm-3 col-xs-12">
                        <h3 class="font title-category-2">Pago</h3>
                    </div>
                    <div class="col-sm-8 col-xs-10">
                        <span>{{$overview['prices']}}</span><br>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        @if($id == $overview['servid']) 
                        <a href="{{url('/create-service/hosting')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                        @endif
                    </div>
                </div>
               <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Requerimientos</h3>
                </div>
                @foreach(array_chunk($notes, round(count($notes)/2)) as $chunk)
                <div class="col-sm-4 col-xs-5">
                     @foreach($chunk as $nt)
                     @if( $nt['check'] == 1 AND $nt['emergency_id'] < 27)
                        {{$nt['type']}} <br>
                        <span>{{$nt['content']}}</span><br>
                        <br>
                        @if($nt['type'] == '¿No tienes requerimientos?' AND $nt['emergency_id'] == 26)
                        {{$nt['type']}} <br>
                        Cualquiera puede disfrutar de mi experiencia <br>
                        @endif
                     @endif
                     @endforeach
                </div>
                @endforeach
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-service/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
                </div>
            </div>
                <div class="sections">
                    <hr class="black">
                     <div class="col-sm-3 col-xs-12">
                        <h3 class="font title-category-2">Reglas de la casa</h3>
                    </div>
                    <div class="col-sm-8 col-xs-10">
                        @if(isset($rules))
                        @foreach($rules as $rule)
                         @if($rule["check"] == 1)
                        <p>{{$rule['type']}}</p>
                        @endif
                        @endforeach
                        @endif
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        @if($id == $overview['servid']) 
                        <a href="{{url('/create-service/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                        @endif
                    </div>
                </div>
                <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">¿Que mas deberian saber tus invitados?</h3><br>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <span>{{$notes[0]['content']}}</span>
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-service/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Ofrecimientos</h3><br>
                </div>
                <div class="col-sm-8 col-xs-10">
                   @if(isset($notes) AND $notes !='Not Found')
                    @foreach(array_chunk( array_slice($notes, 3), count($notes)/2) as $chunk)
                    <div class="col-xs-6 col-sm-6">
                        @foreach($chunk as $nt)
                        @if( $nt['check'] == 1 AND $nt['emergency_id'] >= 27)
                        {{$nt['type']}} <br>
                        <span>{{$nt['content']}}</span><br>
                        <br>
                        @if($nt['type'] == '¿No tienes requerimientos?' AND $nt['emergency_id'] == 33)
                        {{$nt['type']}} <br>
                        No estoy ofreciendo nada <br>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-service/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                      <img class="img-contact" src="{{$overview['avatar']}}" alt="">
                      <h3 class="font title-category-2">{{$overview['name']}}</h3>
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