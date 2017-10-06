@extends('layouts.master') @section('title', 'Co-Host') @section('class', 'contenedor') @section( 'content')@include('CreateParking.navbar.navbar',['activo' => 'co-host'])
<div class="container-fluid">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <h2 class="titulo text-left">Co-Host</h2>
                    <h3 class="titulo text-left">Hostear es mucho más facil con ayuda</h3>
                    <span class="titulo text-center">Tu co-host  puede ayudarte con tu listado, para que asi puedas disgrutar con un poco mas de ayuda ofreciendo tu espacio.</span>
                    <br>
                    <br>
                    <button id="inviteF" type="button" class="btn btn-default hidden"></button>
                    <label class="textwhite" for="inviteF">Invitar Amigo <i class="fa fa-plus" aria-hidden="true"></i></label>
                    <hr>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <div class="text-left cheks">
                                <img src="{{url('/assets/img/User.png')}}" alt="">
                            </div>
                            <div class="text-left cheks">
                                <h3 class="titulo">Username</h3>
                                <span>Administrador</span>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-group text-right" style="cursor: pointer;" onclick="theFunction()">
                        <div class="text-left relative">
                            <label class="xlabel"><i class="fa fa-times" aria-hidden="true"></i></i></label>
                            <div class="text-left cheks">
                                <img style="vertical-align:baseline;" src="{{url('/assets/img/User.png')}}" alt="">
                            </div>
                            <div class="text-left cheks" style="margin-top:10px; margin-left:10px;cursor:pointer" id="show" data-toggle="cheks">
                                <h3 class="titulo">Other username</h3>
                                <span>Tu co-host desde <strong>Feb 5, 2017</strong></span>
                                <br>
                                <div id="Hidden">
                                    <a href=""><i class="fa fa-mobile" aria-hidden="true"></i> Informacion de Contacto</a>
                                    <br>
                                    <a href=""><i class="fa fa-user-plus" aria-hidden="true"></i> Convertilo en Primer Anfitrión</a>
                                    <br>
                                    <a href=""><i class="fa fa-power-off" aria-hidden="true"></i> Activar ingresos compartidos</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>¿Qué puede hacer tu co-host? </p>
                <p>El host que agregues a tu listado puede:
                </p>
                <br>
                <p>♦ Aceptar, declinar, cancelar o alterar reservaciones.
                </p>
                <br>
                <p>♦ Ver y responder los mensajes de los huespedes.
                </p>
                <br>
                <p>♦ Editar Precio y disponibilidad.
                </p>
                <br>
                <p>♦ Editar la descripcion del listado (tales como precios, fotos, etc).
                </p>
                <br>
                <p>♦ Interactuar con el servicio al cliente en su nombre.
                </p>
                <br>
                <p>♦ Su co-host no podra acceder a su informaciond e pagos o detalles personales. Como dueño del lsitado podra eliminarlos en cualquier momento.
                </p>
                <br>
                <p>♦ Sus invitados podran ver a sus co-host en su listado, su itinerario, y en todos los mensajes enviados desde su cuenta.
                </p>
                <br>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-parking/notes')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-parking/preview-overview')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection