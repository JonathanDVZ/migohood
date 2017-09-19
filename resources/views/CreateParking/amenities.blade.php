@extends('layouts.master') @section('title', 'Amenities') @section('class', 'contenedor') @section( 'content') @include('CreateParking.navbar.navbar',['activo' => 'amenities'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <h3 class="titulo text-center">COMODIDADES</h3>
                    <br>
                    <form id="formAddAmenities" method="POST" action="{{url('/create-parking/save-fifth')}}">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" name="security" @if(!empty($security) AND $security == 1) {{ 'checked' }} @endif><strong>Cámara de Seguridad</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="padlock" @if(!empty($padlock) AND $padlock == 1) {{ 'checked' }} @endif> <strong>Candado y Llave</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="vigilant" @if(!empty($vigilant) AND $vigilant == 1) {{ 'checked' }} @endif><strong>Vigilancia</strong></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" name="permission" @if(!empty($permission) AND $permission == 1) {{ 'checked' }} @endif><strong>Permiso Requerido</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="valet" @if(!empty($valet) AND $valet == 1) {{ 'checked' }} @endif><strong>Valet Parking</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="other" @if(!empty($other) AND $other == 1) {{ 'checked' }} @endif><strong>Otro</strong></label>
                            </div>
                        </div>
                    </div>
                    <label for="editar">Agregar Comodidades <i class="fa fa-pencil" aria-hidden="true"></i></label>
                    <button id="editar" type="button" class="btn btn-info btn-sm hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <form id="formAddAmenites" method="POST" action="{{url('/create-parking/save-hosting')}}" >
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Agregar Comodidades</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="text-left">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <br>
                                    </div>
                                    <button id="addMore" type="button" class="btn btn-default hidden"></button>
                                    <label for="addMore">Agregar Nuevo <i class="fa fa-plus" aria-hidden="true"></i></label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h4>Información de Contacto</h4>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="text-left">
                                <label>Nombre</label>
                            </div>
                            <div class="text-left">
                                <input type="text" name="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="text-left">
                                <label>Apellido</label>
                            </div>
                            <div class="text-left">
                                <input type="text" name="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="text-left">
                                <label>Telefono <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i></label>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <input type="text" name="quantity" class="form-control">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <input type="text" name="quantity" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label>Instrucciones de Acceso (opcional)</label>
                    <br>
                    <input type="text" name="instruction" class="form-control" value="@if(isset($instruction) AND !empty($instruction)){{ $instruction }}@endif">
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
                <a href="{{url('/create-parking/location')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
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