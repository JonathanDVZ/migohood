@extends('layouts.master') 
@section('title', 'Place Type') 
@section('class', 'contenedor') 
@section('content')
@include('CreateSpace.navbar.navbar',['activo' => 'placetype'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <br>
            <h3 class="titulo text-center">CUENTANOS SOBRE EL LUGAR A AGREGAR</h3>
            <br>
            <div class="row">
                <form id="formPlaceType" method="POST" action="{{ url('/create-space/add-place-type') }}">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>¿Cómo es tu propiedad?:</label>
                        </div>
                        <select class="selectpicker form-control" name="type">
                            @foreach($types as $type)
                                <option value="{{ $type['code'] }}">{{ $type['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>¿Qué ofrece?:</label>
                        </div>
                        <select class="selectpicker form-control" name="accomodation">
                            @foreach($accommodation as $acc)
                                <option value="{{ $acc['code'] }}">{{ $acc['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <div class="text-center">
                            <label>¿Ústed vive en este lugar?:</label> <br>
                            <label class="radio-inline"><input type="radio" name="live" value="1">Si</label>
                            <label class="radio-inline"><input type="radio" name="live" value="0">No</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="service" value="{{ $id }}">
                {{ csrf_field() }}
                <!--<input type="submit">-->
                </form>
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
                <a id="placeTypeNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection