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
    @include('CreateSpace.PreviewSpace.navbar.preview-navbar',['activo2' => 'preview1'])
    <div  class="container-fluid WhiteBack preBody">
        <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div class="sections">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center nopadding">
                    <br>
                    <img class="imgHom2" src="{{$overview["avatar"]}}" alt="">
                    <h4 class="text-center">{{$overview["name"]}} </h4>
                    <br>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 nopadding category-config">
                    <h2 class="text-preview1">{{$overview["title"]}}</h2>
                    <span class="text-preview1">{{$overview["state"]}} , {{$overview["country"]}}</span>
                    <br>
                    <br>
                    <br>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left nopadding-right">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Private-Room.png')}}" alt="">
                        <br>
                        <span>{{$overview["category"]}}</span>
                    </div>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left nopadding-right">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$overview["guest"]}} invitado(s)</span>

                    </div>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left nopadding-right">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Bedroom.png')}}" alt="">
                        <br>
                        <span>{{$bedrooms[0]["num_bedrooms"]}} Habitacion(es)<span>
                    </div>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left nopadding-right">
                     <img class="imgHom3" src="{{url('/assets/img/Icon-Bed.png')}}" alt="">
                     <br>
                     <span>{{ $beds[0]["num_bed"] }}  Cama</span>
                    </div>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Sobre el lugar</h3>
                </div>
                <div class="col-sm-8 col-xs-10 config-about text-justify">
                    <p>{{$description[0]['content']}}</p>
                    <a href="" class="">Contacta al host</a>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/location')}}"><img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""></a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">El Lugar</h3>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <strong>Accomodates: </strong><span>{{$overview["accommodation"]}}</span><br>
                    <strong>Baños:</strong><span>{{$overview["bathrooms"]}}</span><br>
                    <strong>Habitaciones: </strong><span>{{$bedrooms[0]["num_bedrooms"]}}</span><br>
                    <strong>Camas: </strong><span>{{ $beds[0]["num_bed"] }}</span><br>
                    <a href="#">Reglas de la Casa</a>
                    <br>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <strong>Check-in: </strong><span>Despues de las {{date('h:i A', strtotime($overview["check_in"]) )}}</span><br>
                    <strong>Tipo de Propiedad: </strong><span>{{$overview["type"]}}</span><br>
                    <strong>Tipo de Habitacion: </strong><span>{{$overview["accommodation"]}}</span><br>
                    {{-- <strong>Tipo de Baño: </strong><span>Privadoe</span><br> --}}
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/place-type')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Comodidades</h3>
                </div>
                <div class="col-sm-4 col-xs-5">
                     @foreach($amenities as $amenitie)
                    @if($amenitie['type_amenities_id'] == 1)
                      <strong><img class="lilicon" src="{{url('/assets/img/Icon-Pets.png')}}" alt=""> </strong><span>{{$amenitie["amenities"]}}</span><br>
                      @endif
                    @endforeach 
                     ¿Qué ofreces?<br>
                    @foreach($amenities as $amenitie)
                    @if($amenitie['type_amenities_id'] == 2)
                      <strong><img class="lilicon" src="{{url('/assets/img/Icon-Pets.png')}}" alt=""> </strong><span>{{$amenitie["amenities"]}}</span><br>
                      @endif
                    @endforeach 
                     
                      <a href="{{url('/create-space/amenities')}}">&nbsp+ Mas</a>
                    <br>
                    <br>
                </div>
                    
                 <div class="col-sm-4 col-xs-5">
                    ¿Qué lugares puede usar el huesped?<br>
                     @foreach($amenities as $amenitie2)
                     @if($amenitie2['type_amenities_id'] == 3)
                 <strong><img class="lilicon" src="{{url('/assets/img/Icon-Family.png')}}" alt=""> </strong><span>{{$amenitie2["amenities"]}}</span><br> 
                 @endif
                  @endforeach 
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/amenities')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
               
          
                </div>
                <br>
            </div>
            <div class="sections config-section-preview">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font margin-title">Precios</h3>
                </div>
                <div class="col-sm-8 col-xs-10 price-config">
                    <span><strong>Cancelacion: </strong></span><span>{{$overview["prices"]}}</span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/hosting')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
                <br>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Descripción</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    @foreach($description as $description)
                    @if($description['description_id'] == 8)
                    <p> {{ $description['content'] }} </p>
                    @endif
                    @endforeach
                </div>

                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
                <br>
            </div>
            <div class="sections">
                <hr class="black">
                 <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Reglas de la casa</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <p>Llegar antes de las 11</p>
                    <p>No se permiten mascotas</p>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Disponibilidad</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                  @foreach($rules as $rule)
                    @if($rule["check"] == 1)
                    <span>{{$rule["type"]}}</span>
                    @endif
                  @endforeach
                  @foreach($rules as $rule)

                    @if($rule["description"] != '')
                    @if($rule["type"] != 'Password Wifi')
                        {{$rule["type"]}} <br>
                        <span>{{$rule["description"]}}</span>
                        <br>
                        @else
                        {{$rule["type"]}} <br>
                        <span>You must to contact the host</span>
                        <br>
                    @endif
                    @endif
                    @endforeach
                    <br>
                    <a href="#">Ver Calendario <span class="glyphicon glyphicon-calendar"></span></a>
                    <br>
                    <br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/listing')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Tambien deberias saber</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <p> {{ $tknow['content'] }} </p>
                    <br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Seguridad</h3>
                </div>
                  @foreach(array_chunk($note_emergency, 5) as $chunk)
                    <div class="col-sm-4 col-xs-5">
                        @foreach($chunk as $note)
                        @if($note['check'] == 1 OR $note['content'] !='')
                        <span>{{$note["type"]}}</span><br>
                        <span></span><br>
                        @endif
                        @endforeach
                    </div>
                  @endforeach
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
             </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="title-category-2 font">Instrucciones de Emergencia</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                  @foreach($exit_emergency as $exit)
                    <p>{{$exit["type"]}}         :        {{$exit["content"]}} </p>
                  @endforeach
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($overview['servid'] == $overview['userid'])
                    <a href="{{url('/create-space/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>@endif
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="title-category-2 font">Numeros de Emergencia</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <br>
                    <p>
                    @if($overview['servid'] == $overview['userid'])
                        @if(!isset($emergencies) AND !empty($emergencies))
                            @foreach($emergencies as $emergency)
                              {{$emergency["name"]}}   :    {{$emergency["number"]}}
                              <br>
                            @endforeach
                        </p>
                        @endif
                        <br>
                        @else
                   <img class="lilicon" src="{{url('assets/img/Icon-Information.png')}} " alt=""> <p>You must be a guest to see emergency numbers</p>
                    @endif 
                      
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href="{{url('/create-space/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 light-border">

        </div>
    </div>
</div>


@endsection
