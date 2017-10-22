@extends('layouts.master') @section('title', 'Preview Created Parking') @section('class', 'contenedor') @section( 'content')
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
    @include('CreateParking.PreviewParking.navbar.preview-navbar',['activo2' => 'preview1'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 light-border">
            <div class="sections">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center nopadding">
                    <br>
                    <img class="imgHom2" src="{{$overview['avatar']}}" alt="">
                    <h4 class="text-center">{{$overview['name']}}</h4>
                    <br>
                </div>
                <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12 category-config">
                    <h3>{{$overview['title']}}</h3>
                    <span>{{$overview['city']}} {{$overview['state']}}, {{$overview['country']}}</span>
                    <br><br>
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="imgHom10" src="{{url('/assets/img/garaje2.jpg')}}" alt="">
                        <p>{{$overview['type']}}</p>
                    </div>
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="imgHom10" src="{{url('/assets/img/car2.jpg')}}" alt="">
                        <p>{{$overview['num_space']}} Espacios</p>
                    </div>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Sobre este servicio</h3>
                </div>
                <div class="col-sm-8 col-xs-10 config-about text-justify">
                    <p>@foreach($description as $ds)
                    @if($ds['description_id'] == 8)
                    {{$ds['content']}}
                    @endif
                    @endforeach</p>
                    <a href="{{url('/create-parking/basics')}}" class="">Contacta al host</a>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/place-type')}}"><img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""></a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Requerimientos</h3>
                </div>
                @foreach(array_chunk($rules, round(count($rules)/2)) as $chunk)
                <div class="col-sm-4 col-xs-5">
                    @foreach($chunk as $rl)
                    @if( $rl['check'] == 1)
                        {{$rl['type']}} <br>
                    <p>&nbsp<i class="fa fa-mobile fa-2x" aria-hidden="true"></i> Numero de telefono</p>
                    <p><i class="fa fa-male fa-2x" aria-hidden="true"></i> Recomendacion</p>
                     @endif
                     @endforeach
                </div>
                @endforeach
             {{--  <div class="col-sm-4 col-xs-5">
                    <p><i class="fa fa-glass fa-2x" aria-hidden="true"></i> Edad legal para beber</p>
                    <p><i class="fa fa-envelope fa-2x" aria-hidden="true"></i> Correo</p>
                </div>--}} 
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-parking/listing')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Reglas</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    {{$rules[0]['description']}}
                    <br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-parking/listing')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">¿Que mas deberian saber tus invitados?</h3><br>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <span>@if(isset($note_emergency))
                        {{$note_emergency[0]['content']}}
                        @endif
                    </span>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-parking/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Comodidades</h3>
                </div>
                @foreach(array_chunk( $amenities, round(count($amenities)/2)) as $chunk)
                <div class="col-sm-4 col-xs-5">
                    @foreach($chunk as $am)
                    @if($am['check'] == 1)
                     <span><i class="fa fa-check icon-text" aria-hidden="true"></i>  {{$am['amenities']}} <br><br></span>
                    @else
                    <span><i class="fa fa-times icon-text" aria-hidden="true"></i>{{$am['amenities']}} <br><br></span>
                    @endif
                    @endforeach
                </div>
                @endforeach
             {{--   <div class="col-sm-4 col-xs-5">
                    <span><i class="fa fa-lock icon-text" aria-hidden="true"></i>&nbsp&nbsp Candado y llaves</span>
                </div> --}}
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-parking/amenities')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
    </div>
</div>
@endsection