@section('title', 'Locations') @extends('layouts.master') @section('class', 'contenedor') @section( 'content') @include('CreateParking.navbar.navbar',['activo' => 'location'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="text-right">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-4">
                        <h3 class="titulo text-center">AYUDA A LOS INVITADOS A ENCONTRAR TU ESPACIO</h3>
                        <br>
                        <div class="form-group text-right">
                            <div class="text-left">
                                <div class="text-left">
                                    <label>Pais:</label>
                                </div>
                                <select class="selectpicker form-control required">
                                    <option></option>
                                    <option>Cama King</option>
                                    <option>Cama Queen</option>
                                    <option>Otra</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                <label>Direccion:</label>
                            </div>
                            <div class="text-left">
                                <input type="text" name="quantity" class="form-control" placeholder="Calle 1" required>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                <label>Apartamento, Suite (Opcional)</label>
                            </div>
                            <div class="text-left">
                                <input type="text" name="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                <label>Estado</label>
                            </div>
                            <select class="selectpicker form-control required">
                                    <option>Distrito Capital</option>
                                    <option>Barinas</option>
                                    <option>Barquisimeto</option>
                                    <option></option>
                                </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="text-left">
                                    <label>Ciudad</label>
                                </div>
                                <div class="text-left">
                                    <input type="text" name="quantity" class="form-control" placeholder="Caracas">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="text-left">
                                    <label>Codigo Postal</label>
                                </div>
                                <div class="text-left">
                                    <input type="text" name="quantity" class="form-control" placeholder="19875">
                                </div>
                            </div>
                        </div>
                        <div>
                            <br>
                            <div class="text-left">
                                <label>¿Dónde esta ubicada tu propiedad?</label>
                                <br>
                                <span>Calle 1, España, Barcelona 198756, España</span>
                                <br>
                                <a href="">Editar Direccion</a>
                                <br>
                            </div>
                            <div id="googleMap" style="width:100%;height:300px;"></div>
                            <script>
                                function myMap() {
                                    var mapProp = {
                                        center: new google.maps.LatLng(51.508742, -0.120850),
                                        zoom: 5,
                                    };
                                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                                }
                            </script>
                        </div>
                        <div>
                            <div class="form-group text-left">
                                <h4 class="text-left">El Vecindario</h4>
                                <label for="">Resumen</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>

                            <div class="form-group text-left">
                                <label for="">¿Cómo son los alrededores?</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
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
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-parking/place-type')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-parking/amenities')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection