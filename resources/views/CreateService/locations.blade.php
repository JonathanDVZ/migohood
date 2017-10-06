@section('title', 'Locations') @extends('layouts.master') @section('class', 'contenedor') @section( 'content') @include('CreateService.navbar.navbar',['activo' => 'location'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <form id="formAddLocationService" action="{{ url('/create-service/save-location') }}" method="POST">
                <div class="text-right">
                    <h3 class="titulo text-center">Agrega un lugar de Reunion</h3>
                    <br>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <label>Nombre de la Locacion</label>
                        </div>
                        <div class="text-left">
                            <input type="text" name="around" class="form-control" placeholder="" value="@if(isset($around) AND !empty($around)){{ $around }}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <div class="text-left">
                                <label>Pais:</label>
                            </div>
                            <select id="spaceCountry" name="country" class="selectpicker form-control" required>
                                <option>Selecciona un Pais</option>
                                @foreach($countries as $country)
                                    <option @if(isset($result[0]['country']) AND !empty($result[0]['country']) AND $result[0]['country'] == $country['name']) {{'selected'}} @endif value="{{$country['id']}}">{{$country['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <div class="text-left">
                                <label>Estado:</label>
                            </div>
                            <div id="resultState">
                                <select id="spaceState" name="state" class="selectpicker form-control" required>
                                    <option>Seleccione un Estado</option>
                                    @if(isset($states) AND !empty($states))
                                        @foreach($states as $state)
                                            <option @if(isset($result[0]['state']) AND !empty($result[0]['state']) AND $result[0]['state'] == $state['state']) {{'selected'}} @endif value="{{$state['id']}}">{{$state['state']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <label>Calle</label>
                        </div>
                        <div class="text-left">
                            <input type="text" id="spaceAddress" name="address" class="form-control" placeholder="Calle 1" value="@if(isset($address) AND !empty($address)){{ $address }}@endif" required>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <label>Apt, Suite, Bdg</label>
                        </div>
                        <div class="text-left">
                            <input type="text" id="spaceApartment" name="apartment" value="@if(isset($apartment) AND !empty($apartment)){{ $apartment }}@endif" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <label>Ciudad</label>
                        </div>
                        <div id="resultCity">
                            <select id="spaceCities" name="city" class="selectpicker form-control" required>
                                <option>Seleccione una Ciudad</option>
                                @if(isset($cities) AND !empty($cities))
                                    @foreach($cities as $city)
                                        <option @if(isset($result[0]['city']) AND !empty($result[0]['city']) AND $result[0]['city'] == $city['city']) {{'selected'}} @endif value="{{$city['id']}}">{{$city['city']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <label>Codigo Postal</label>
                        </div>
                        <div class="text-left">
                            <input type="text" id="spaceZipcode" name="zipcode" class="form-control" placeholder="19875" value="@if(isset($result[0]['zipcode']) AND !empty($result[0]['zipcode'])){{ $result[0]['zipcode'] }}@endif">
                        </div>
                    </div>
                    <div>
                        <br>
                        <div class="text-left">
                            <label>¿Dónde esta ubicada tu servicio</label>
                            <br>
                            <br>
                            <span id="selectedAddress"></span><span id="selectedZipcode"></span><span id="selectedCity"></span><span id="selectedState"></span><span id="selectedCountry"></span></span>
                            <br>
                            <br>
                            <a href="">Editar Direccion</a>
                            <br>
                        </div>
                        <div id="googleMap" style="width:100%;height:300px;"></div>
                        <input type="hidden" name="latitude" id="latitude" value="@if(isset($latitude) AND !empty($latitude)){{ $latitude }}@endif">
                        <input type="hidden" name="longitude" id="longitude" value="@if(isset($longitude) AND !empty($longitude)){{ $longitude }}@endif">
                    </div>
                    <div>
                        <div class="form-group text-left">
                            <h4 class="text-left">Menciona donde estarás</h4>
                            <textarea name="info" class="form-control" rows="5" id="comment">@if(isset($description) AND !empty($description)){{ $description }}@endif</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="service_id" value="{{$id}}"> {{ csrf_field() }}
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="Wbox">
                <p>Tu direccion exacta solo sera mostrada a personas que tengan una reservacion confirmada</p>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-service/photos')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="LocationService"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection