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
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Mascotas permitidas</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""> <strong>Eventos permitidos</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Produccion permitida</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Ambiente familiar</strong></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Invitado de negocios</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>No fumadores</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Gimnasio</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Estacionamiento</strong></label>
                            </div>
                        </div>
                    </div>
                    <h4>¿Qué ofreces?</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Shampoo</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>TV por Cable</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Amenities</strong></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Wifi</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Aire Acondicionado</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Amenities</strong></label>
                            </div>
                        </div>
                    </div>
                    <h4>¿Qué lugares puede usar el huesped?</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Cocina</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Lavadora</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Secadora</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Agua Caliente</strong></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Estacionamiento</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Ascensor</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Pool</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Gimnasio</strong></label>
                            </div>
                        </div>
                    </div>
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
                <a href="{{url('/create-space/hosting')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection