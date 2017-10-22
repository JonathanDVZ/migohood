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
                    <a href="" style="font-weight:bolder">Contactar anfiltrion</a>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-service/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
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
                    <a href="{{url('/create-service/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
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
                            <a href="{{url('/create-service/hosting')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
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
                        <a href="{{url('/create-service/hosting')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
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
                    <a href="{{url('/create-service/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
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
                        <a href="{{url('/create-space/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
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
                    <a href="{{url('/create-service/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Ofrecimientos</h3><br>
                </div>
                <div class="col-sm-8 col-xs-10">
                   
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
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-service/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
        </div>
</div>


@endsection