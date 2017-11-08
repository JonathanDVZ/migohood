@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">

 @include('partials.slider')
 
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
                    @if(isset($description))
                    <p>{{$description[0]['content']}}</p>
                    @endif
                    <a href="" class="" data-toggle="modal" data-target="#contact-host">Contacta al host</a>
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/location')}}"><img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""></a>
                    @endif
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
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/place-type')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                      @if($id == $overview['servid']) 
                      <a href="{{url('/create-space/amenities')}}">&nbsp+ Mas</a>
                      @endif
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/amenities')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
          
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/hosting')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/listing')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/basics')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                    @if($overview['servid'] == $id)
                        @if(isset($emergencies) AND !empty($emergencies))
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
                     @if($id == $overview['servid']) 
                    <a href="{{url('/create-space/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 light-border">

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
