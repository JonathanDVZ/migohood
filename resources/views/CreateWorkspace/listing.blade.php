@section('title', 'Basics') @extends('layouts.master') @section('class', 'contenedor') @section( 'content') @include('CreateWorkspace.navbar.navbar',['activo' => 'listing'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
                    <h3 class="titulo text-left">Normas del Espacio de Trabajo</h3>
                    <span class="titulo text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit illum molestiae veritatis</span>
                    <br>
                     <form id="formAddListing" method="POST" action="{{url('/create-workspace/save-listing')}}">
                        <div class="row">
                            <br>
                            
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <div class="form-group text-left">
                                    <label><strong>Se permiten niños (de 2 a 12 años)</strong></label>
                                </div>
                                <div class="form-group text-left">
                                    <label><strong></strong>¿Pueden hospedarse mascotas? <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="form-group text-left">
                                    <label><strong></strong>¿Fumar esta permitido?</label>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <label class="switch">
                                    <input name="AptoDe2a12" @if(!empty($AptoDe2a12) AND $AptoDe2a12 == 1) {{ 'checked' }} @endif type="checkbox">
                                    <div class="slider round"></div>
                                </label>
                                <br>
                                <label class="switch">
                                    <input name="SeadmitenMascotas" type="checkbox" @if(!empty($SeadmitenMascotas) AND $SeadmitenMascotas == 1) {{ 'checked' }} @endif>
                                    <div class="slider round"></div>
                                </label>
                                <br>
                                <label class="switch">
                                    <input name="PermitidoFumar" type="checkbox" @if(!empty($PermitidoFumar) AND $PermitidoFumar == 1) {{ 'checked' }} @endif>
                                    <div class="slider round"></div>
                                </label>
                            </div>
                        </div>
                        <label>Normas adicionales</label>
                    <div class="text-left">
                        <textarea name="Desc_Otro_Evento" class="form-control" rows="5" id="comment">@if(!empty($Desc_Otro_Evento)) {{ $Desc_Otro_Evento }} @endif</textarea>
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
                                <label><input name="guest_phone" type="checkbox" @if(!empty($guest_phone) AND $guest_phone == 1) {{ 'checked' }} @endif><strong>Numero de Telefono</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_email" @if(!empty($guest_email) AND $guest_email == 1) {{ 'checked' }} @endif><strong>Dirección de Correo</strong></label>
                            </div>
                            <div class="text-left">
                                <br>
                                <label><strong>Requerimientos adicionales</strong></label><br>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_provided" @if(!empty($guest_provided) AND $guest_provided == 1) {{ 'checked' }} @endif><strong>Documento de identidad</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_recomendation" @if(!empty($guest_recomendation) AND $guest_recomendation == 1) {{ 'checked' }} @endif><strong>Recomendacion</strong></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_profile" @if(!empty($guest_profile) AND $guest_profile == 1) {{ 'checked' }} @endif><strong>Foto de Perfil</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_payment" @if(!empty($guest_payment) AND $guest_payment == 1) {{ 'checked' }} @endif><strong>Informacion de Pago</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <br>
                        <label><strong>Manual del Espacio de Trabajo</strong></label><br>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quo, corrupti id veniam, sit omnis fugiat </span>
                    </div>
                    <div class="text-left">
                        <br>
                        <span><strong>Instrucciones</strong></span>
                    </div>
                    <div class="text-left">
                        <br>
                        <textarea name="Desc_Instructions" class="form-control" rows="5" id="comment">@if(!empty($Desc_Instructions)) {{ $Desc_Instructions }} @endif</textarea>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group text-left">
                            <br>
                            <label for="wifiName">Nombre del Wifi</label>
                            <input name="Desc_Name_Network" type="text" class="form-control" id="wifiName" value="@if(!empty($Desc_Name_Network)) {{ $Desc_Name_Network }} @endif">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group text-left">
                            <br>
                            <label for="wifiPas">Clave del Wifi</label>
                           <input name="Password_Wifi" type="password" class="form-control" id="wifiPas" value="@if(!empty($Password_Wifi)) {{ $Password_Wifi }} @endif">
                        </div>
                    </div>
                    <input type="hidden" name="service_id" value="{{ $id }}">
                        {{csrf_field()}}
                    </form>
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
                <a href="{{url('/create-workspace/basics')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addListingNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection