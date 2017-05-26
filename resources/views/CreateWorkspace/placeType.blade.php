@extends('layouts.master') @section('title', 'Place Type') @section('class', 'contenedor') @section('content') @include('CreateParking.navbar.navbar',['activo' => 'placetype'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <h4>¿Qué tipo de aparcamiento esta ofreciendo?</h4>
                <form>
                    <input type="hidden" id="_token" value="{{csrf_token()}}">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <div class="text-left">
                                <label>¿Qué ofrece?:</label>
                            </div>
                            <br>
                            <select class="selectpicker form-control required">
                                    <option>Coworking</option>
                                    <option>Garage</option>
                                    <option>Garage</option>
                            </select>
                            <br>
                            <br>
                            <select class="selectpicker form-control required">
                                    <option>Todo el espacio</option>
                                    <option>Garage</option>
                                    <option>Garage</option>
                            </select>
                            <br>
                            <br>
                            <div id="lilbox">
                                <div class="radio">
                                    <label class="textwhite"><input data-type="Exterior" onclick="dataType(this)" type="radio" name="optradio" ><strong>Privado</strong></label>
                                </div>
                                <hr>
                                <div class="radio">
                                    <label class="textwhite"><input data-type="Interior" onclick="dataType(this)" type="radio" name="optradio" ><strong>Compartido</strong></label>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 lilpadding">
                            <button type="button" class="btn Giantb">
                            Solo
                            <br>
                            1 persona
                            <br>
                            </button>
                            <br>
                            <br>
                            <button type="button" class="btn Giantb">
                            Grupo Pequeño
                            <br>
                            Hasta 6 Personas
                            <br>

                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 lilpadding">
                            <button type="button" class="btn Giantb">
                            Grupo Grande
                            <br>
                            Hasta 12 personas
                            <br>
                            </button>
                            <br>
                            <br>
                            <button type="button" class="btn Giantb">
                            Evento
                            <br>
                            Mas de 12 personas
                            <br>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

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
                <a href="{{url('/becomeahost')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="" onclick="splet()"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection