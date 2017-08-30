@section('title', 'Basics') @extends('layouts.master') @section('class', 'contenedor') @section( 'content') @include('CreateService.navbar.navbar',['activo' => 'basics'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                 <form id="formAddBasicsService" method="POST" action="{{url('/create-service/save-basics')}}">
                <div class="col-sm-10 col-sm-offset-2">
                    <h3 class="titulo text-left">CUENTALE A LOS VIAJEROS SOBRE TU LUGAR</h3>
                    <span class="titulo text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit illum molestiae veritatis</span>
                    <br>
                    <div class="form-group text-left">
                        <h4 class="text-left">Titulo del servicio</h4>
                        <input type="text" name="title" class="form-control" value="@if(!empty($title)) {{ $title }} @endif" required>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>Descripcion:</label>
                        </div>
                        <div class="text-left">
                            <textarea class="form-control" rows="5" id="comment" placeholder="¿Qué estaran haciendo?" name="description">@if(!empty($description)) {{ $description }} @endif</textarea>
                        </div>
                    </div>
                    <h3 class="titulo text-left">Itinerario</h3>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <div class="text-left">
                                <span class="titulo text-center">Describe con detalle que estaras haciendo con tus invitados.</span>
                                <span class="titulo text-center">Mientras mas informacón puedas dar mejor.</span>
                            </div>
                            <div class="text-left">
                                <br>
                                <textarea class="form-control" rows="5" id="comment" placeholder="¿Qué estaran haciendo?" name="des_guest">@if(!empty($interaction)) {{ $interaction }} @endif</textarea>
                            </div>
                        </div>
                    </div>
                    <h3 class="titulo text-left">Requerimientos de invitados</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input name="guest_phone" type="checkbox" @if(!empty($guest_phone) AND $guest_phone == 1) {{ 'checked' }} @endif><strong>Número Telefónico</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_email" @if(!empty($guest_email) AND $guest_email == 1) {{ 'checked' }} @endif> <strong>Correo</strong></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_profile" @if(!empty($guest_profile) AND $guest_profile == 1) {{ 'checked' }} @endif><strong>Foto de Perfil</strong></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="guest_payment" @if(!empty($guest_payment) AND $guest_payment == 1) {{ 'checked' }} @endif><strong>Información de Pago</strong></label>
                            </div>
                        </div>
                    </div>
                    <h3 class="titulo text-left">Requerimientos adicionales</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="guest_provided" @if(!empty($guest_provided) AND $guest_provided == 1) {{ 'checked' }} @endif><strong>Documento de Identidad</strong></label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="guest_recomendation" @if(!empty($guest_recomendation) AND $guest_recomendation == 1) {{ 'checked' }} @endif><strong>Recomendación</strong></label>
                    </div>
                    <h3 class="titulo text-left">Reglas</h3>
                    <div class="row">
                        <br>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <div class="form-group text-left">
                                <label><strong>Apto para niños (2 - 12 años)</strong></label>
                            </div>
                            <div class="form-group text-left">
                                <label><strong>Apto para bebes (0 - 2 años)</strong></label>
                            </div>
                            <div class="form-group text-left">
                                <label><strong></strong>Apto para mascotas <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i></label>
                            </div>
                            <div class="form-group text-left">
                                <label><strong></strong>Permitido Fumar</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label class="switch">
                        <input name="AptoDe2a12" @if(!empty($AptoDe2a12) AND $AptoDe2a12 == 1) {{ 'checked' }} @endif type="checkbox">
                        <div class="slider round"></div>
                        </label>
                            <br>
                            <label class="switch">
                        <input name="AptoDe0a2" type="checkbox" @if(!empty($AptoDe0a2) AND $AptoDe0a2 == 1) {{ 'checked' }} @endif>
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
                    <h3 class="titulo text-left">Reglas Adicionales</h3>
                    <div class="text-left">
                        <textarea name="Desc_Otro_Evento" class="form-control" rows="5" id="comment">@if(!empty($Desc_Otro_Evento)) {{ $Desc_Otro_Evento }} @endif</textarea>
                    </div>

                </div>
                <input type="hidden" name="service_id" value="{{ $id }}">
                  {{csrf_field()}}
                </form>
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
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-service/hosting')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="BasicsService"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection