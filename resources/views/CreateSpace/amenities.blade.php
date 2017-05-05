@extends('layouts.master') 
@section('title', 'Amenities') 
@section('class', 'contenedor') 
@section( 'content') 
@include('CreateSpace.navbar.navbar',['activo' => 'amenities'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h3 class="titulo text-center">DETALLES DE LA ESTADIA</h3>
                    <br>
                    <form id="formAddAmenities" method="POST" action="{{url('/create-space/save-amenities')}}">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                @foreach($detalles1 as $detail)
                                <div class="checkbox">
                                    <label><input name="amenities[]" type="checkbox" value="{{$detail['code']}}"> <strong>{{$detail['name']}}</strong></label>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                @foreach($detalles2 as $detail)
                                <div class="checkbox">
                                    <label><input name="amenities[]" type="checkbox" value="{{$detail['code']}}"> <strong>{{$detail['name']}}</strong></label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <h4>¿Qué ofreces?</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                @foreach($ofrece1 as $o)
                                <div class="checkbox">
                                    <label><input name="amenities[]" type="checkbox" value="{{$o['code']}}"> <strong>{{$o['name']}}</strong></label>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                @foreach($ofrece2 as $o)
                                <div class="checkbox">
                                    <label><input name="amenities[]" type="checkbox" value="{{$o['code']}}"> <strong>{{$o['name']}}</strong></label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <h4>¿Qué lugares puede usar el huesped?</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                @foreach($lugares1 as $place)
                                <div class="checkbox">
                                    <label><input name="amenities[]" type="checkbox" value="{{$place['code']}}"> <strong>{{$place['name']}}</strong></label>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                @foreach($lugares2 as $place)
                                <div class="checkbox">
                                    <label><input name="amenities[]" type="checkbox" value="{{$place['code']}}"> <strong>{{$place['name']}}</strong></label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{csrf_field()}}
                        <input type="hidden" name="service_id" value="{{$id}}">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>Mostrar lo esencial ayuda a los huespedes a sentirse como en casa en tu estancia.</p>
                <br>

                <p>Algunos dueños proveen desayuno o solo cafe y té. Ninguna de estas cosas son requeridas, aunque a veces agregar un buen toque, para ayudar a los huespedes a sentirse bienvenidos.</p>
                <br>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-space/location')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addAmenitiesNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection