@section('title', 'Basics') 
@extends('layouts.master') 
@section('class', 'contenedor') 
@section( 'content') 
@include('CreateSpace.navbar.navbar',['activo' => 'listing'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4">
                    <h3 class="titulo text-left">Reglas de la Casa</h3>
                    <span class="titulo text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit illum molestiae veritatis</span>
                    <br>
                    <div class="form-group text-left">
                        <h4 class="text-left cheks">Titulo de la publicacion</h4>
                        <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                    </div>
                    <div class="form-group text-left">
                        <h4 class="text-left cheks">Video o Fotos permitidas</h4>
                        <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                    </div>
                    <div class="form-group text-left">
                        <h4 class="text-left cheks">¿Pueden hospedarse mascotas?</h4>
                        <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                    </div>
                    <div class="form-group text-left">
                        <h4 class="text-left cheks">Eventos o fiestas permitidos</h4>
                        <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                    </div>

                    <div class="form-group text-left">
                        <div class="text-left">
                            <br>
                            <label><strong>Otras reglas que quisiera mencionar</strong></label><br>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quo, corrupti id veniam, sit omnis fugiat </span>
                        </div>
                        <div class="text-left">
                            <br>
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <div class="text-left">
                            <br>
                            <label><strong>Requerimientos de los invitados</strong></label><br>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quo, corrupti id veniam, sit omnis fugiat </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Numero de Telefono</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Dirección de Correo</strong></label>
                            </div>
                            <div class="text-left">
                                <br>
                                <label><strong>Requerimientos adicionales</strong></label><br>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Identificacion requerida</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Recomendacion</strong></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Foto de Perfil</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value=""><strong>Informacion de Pago</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <br>
                        <label><strong>Guia de la Casa</strong></label><br>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quo, corrupti id veniam, sit omnis fugiat </span>
                    </div>
                    <div class="text-left">
                        <br>
                        <span><strong>Instrucciones</strong></span>
                    </div>
                    <div class="text-left">
                        <br>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group text-left">
                                <br>
                                <label for="wifiName">Nombre del Wifi</label>
                                <input type="text" class="form-control" id="wifiName">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group text-left">
                                <br>
                                <label for="wifiPas">Clave del Wifi</label>
                                <input type="password" class="form-control" id="wifiPas">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="cheks">
                            <button type="button" class="btn btn-md works2" data-toggle="button">Agregar Idioma</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>Tu direccion exacta solo sera mostrada a personas que tengan una reservacion confirmada</p>
                <br>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-space/basics')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href=""><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection