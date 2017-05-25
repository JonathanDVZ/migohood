@section('title', 'Basics') @extends('layouts.master') @section('class', 'contenedor') @section( 'content') @include('CreateParking.navbar.navbar',['activo' => 'listing'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
                    <h3 class="titulo text-left">Normas de Aparcamiento</h3>
                    <span class="titulo text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit illum molestiae veritatis</span>
                    <br>

                    <div class="text-left">
                        <textarea class="form-control" rows="7" id="comment"></textarea>
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
                                <label><input type="checkbox" value=""><strong>Documento de identidad</strong></label>
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
                        <label><strong>Manual de Aparcamiento</strong></label><br>
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
                <a href="{{url('/create-space/photos')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection