@extends('layouts.master') @section('title', 'Place Type') @section('class', 'contenedor') @section('content') @include('CreateSpace.navbar.navbar',['activo' => 'placetype'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <h4>¿Qué tipo de aparcamiento esta ofreciendo?</h4>
                <form>
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <div class="text-left">
                                <label>¿Qué ofrece?:</label>
                            </div>
                            <select class="selectpicker form-control required">
                                    <option>Garage</option>
                                    <option>Garage</option>
                                    <option>Garage</option>
                            </select>
                            <div id="lilbox">
                                <div class="radio">
                                    <label class="textwhite"><input type="radio" name="optradio"><strong>Exterior</strong></label>
                                </div>
                                <div class="radio">
                                    <label class="textwhite"><input type="radio" name="optradio"><strong>Interior</strong></label>
                                </div>
                            </div>
                            <input type="number" name="num_bathroom" min="1" max="20" class="form-control" step="1" placeholder="1" required>
                            <div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="text-center">
                                <label>¿Ústed vive en este lugar?:</label> <br>
                                <label class="radio-inline"><input type="radio" name="live" value="1">Si</label>
                                <label class="radio-inline"><input type="radio" name="live" value="0">No</label>
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
                <a id="placeTypeNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection