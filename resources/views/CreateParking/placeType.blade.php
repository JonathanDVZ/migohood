@extends('layouts.master') @section('title', 'Place Type') @section('class', 'contenedor') @section('content') @include('CreateParking.navbar.navbar',['activo' => 'placetype'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <h4>¿Qué tipo de aparcamiento esta ofreciendo?</h4>
                <form>
                    <input type="hidden"  id="_token" value="{{csrf_token()}}">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <div class="text-left">
                                <label>¿Qué ofrece?:</label>
                            </div>
                            <br>
                            <select class="selectpicker form-control required" name="type">
                                @foreach($types as $type)
                                    
                                    <option @if(isset($result['Type']) AND !empty($result['Type']) AND $result['Type'] == $type['name']) {{'selected'}} @endif value="{{ $type['code'] }}">{{ $type['name'] }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <div id="lilbox">
                                <div class="radio">
                                    <label class="textwhite"><input data-type="Exterior" onclick="dataType(this)" type="radio" name="optradio" value="0" ><strong>Exterior</strong></label>
                                </div>
                                <hr>
                                <div class="radio">
                                    <label class="textwhite"><input data-type="Interior" onclick="dataType(this)" type="radio" name="optradio" value="1" ><strong>Interior</strong></label>
                                </div>
                            </div>
                            <br>
                            <input type="number" name="num_bathroom" min="1" max="20" class="form-control quantity" step="1" placeholder="0" required>
                            <div>
                            </div>
                        </div>
                    </div>
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
                <a id="" onclick="splet()"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection