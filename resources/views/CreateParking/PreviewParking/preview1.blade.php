@extends('layouts.master') @section('title', 'Preview Created Parking') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">

    @include('partials.slider')
    
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
                    <p>
                    @if(isset($description) AND $description !="null" AND $note_emergency !="Not Found")
                    @foreach($description as $ds)
                    @if($ds['description_id'] == 8)
                    {{$ds['content']}}
                    @endif
                    @endforeach
                    @endif
                </p>
                    <a class="" data-toggle="modal" data-target="#contact-host">Contacta al host</a>
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-parking/place-type')}}"><img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""></a>
                    @endif
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Requerimientos</h3>
                </div>
                @if(isset($rules) AND $rules!= 'null')
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
                @endif
             {{--  <div class="col-sm-4 col-xs-5">
                    <p><i class="fa fa-glass fa-2x" aria-hidden="true"></i> Edad legal para beber</p>
                    <p><i class="fa fa-envelope fa-2x" aria-hidden="true"></i> Correo</p>
                </div>--}} 
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-parking/listing')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
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
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-parking/listing')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">¿Que mas deberian saber tus invitados?</h3><br>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <span>@if(isset($note_emergency) AND $note_emergency !="Not Found" AND $note_emergency !="null")
                        {{$note_emergency[0]['content']}}
                        @endif
                    </span>
                </div>
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-parking/notes')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    @endif
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Comodidades</h3>
                </div>
                @if(isset($amenities) AND $amenities != 'null')
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
                @endif
             {{--   <div class="col-sm-4 col-xs-5">
                    <span><i class="fa fa-lock icon-text" aria-hidden="true"></i>&nbsp&nbsp Candado y llaves</span>
                </div> --}}
                <div class="col-sm-1 col-xs-1">
                    @if($id == $overview['servid']) 
                    <a href="{{url('/create-parking/amenities')}}"> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
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