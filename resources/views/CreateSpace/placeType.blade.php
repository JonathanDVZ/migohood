@extends('layouts.master') 
@section('title', 'Place Type') 
@section('class', 'contenedor') 
@section('content')
<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a class="activo" href="#">Place type</a></li>
                <li><a href="#">Bedrooms</a></li>
                <li><a href="#">Baths</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="#">Amenities</a></li>
                <li><a href="#">Hosting</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <br>
            <h3 class="titulo text-center">CUENTANOS SOBRE EL LUGAR A AGREGAR</h3>
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>¿Cómo es tu propiedad?:</label>
                        </div>
                        <select class="selectpicker form-control">
                                <option>Apartamento</option>
                                <option>Casa</option>
                                <option>Relish</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>¿Qué ofrece?:</label>
                        </div>
                        <select class="selectpicker form-control">
                                <option>Lugar entero</option>
                                <option>Habitacion Privada</option>
                                <option>Habitacion Compartida</option>
                                </select>
                    </div>
                    <div class="form-group text-center">
                        <div class="text-center">
                            <label>¿Ústed vive en este lugar?:</label> <br>
                            <label class="radio-inline"><input type="radio" name="optradio">Si</label>
                            <label class="radio-inline"><input type="radio" name="optradio">No</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <span><strong>Lugar Entero</strong></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
                <br>
                <span><strong>Habitacion Privada</strong></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
                <br>
                <span><strong>Habitacion Compartida</strong></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
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
                <a href="{{url('/becomeahost')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/space-create/bedrooms')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>