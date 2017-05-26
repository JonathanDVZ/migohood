@section('title', 'Locations') @extends('layouts.master') @section('class', 'contenedor') @section( 'content') @include('CreateSpace.navbar.navbar',['activo' => 'location'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="text-right">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-4">
                        <h3 class="titulo text-center">DETALLES DE LA ESTADIA</h3>
                        <br>
                        <form id="formAddLocation" action="{{ url('/create-space/save-location') }}" method="POST">

                            <div class="form-group text-right">
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
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label>Estado</label>
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
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="text-left">
                                        <label>Ciudad</label>
                                    </div>
                                    <div class="text-left">
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
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="text-left">
                                        <label>Codigo Postal</label>
                                    </div>
                                    <div class="text-left">
                                        <input type="text" id="spaceZipcode" name="zipcode" class="form-control" placeholder="19875" value="@if(isset($result[0]['zipcode']) AND !empty($result[0]['zipcode'])){{ $result[0]['zipcode'] }}@endif">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label>Direccion:</label>
                                </div>
                                <div class="text-left">
                                    <input type="text" id="spaceAddress" name="address" class="form-control" placeholder="Calle 1" value="@if(isset($address) AND !empty($address)){{ $address }}@endif" required>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label>Apartamento, Suite (Opcional)</label>
                                </div>
                                <div class="text-left">
                                    <input type="text" id="spaceApartment" name="apartment" value="@if(isset($apartment) AND !empty($apartment)){{ $apartment }}@endif" class="form-control">
                                </div>
                            </div>
                            <div>
                                <br>
                                <div class="text-left">
                                    <label>¿Dónde esta ubicada tu propiedad?</label>
                                    <br>
                                    <span id="selectedAddress"></span><span id="selectedZipcode"></span><span id="selectedCity"></span><span id="selectedState"></span><span id="selectedCountry"></span></span>
                                    <br>
                                    <!--<a href="">Editar Direccion</a>
                                    <br>-->
                                </div>
                                <div id="googleMap" style="width:100%;height:300px;"></div>
                                <input type="hidden" name="latitude" id="latitude" value="@if(isset($latitude) AND !empty($latitude)){{ $latitude }}@endif">
                                <input type="hidden" name="longitude" id="longitude" value="@if(isset($longitude) AND !empty($longitude)){{ $longitude }}@endif">
                                <script>
                                    
                                </script>
                            </div>
                            <div>
                                <div class="form-group text-left">
                                    <h4 class="text-left">Informacion General</h4>
                                    <textarea name="info" class="form-control" rows="5" id="comment">@if(isset($description) AND !empty($description)){{ $description }}@endif</textarea>
                                </div>

                                <div class="form-group text-left">
                                    <h4 class="text-left">¿Cómo son los alrededores?</h4>
                                    <textarea name="around" class="form-control" rows="5" id="comment">@if(isset($around) AND !empty($around)){{ $around }}@endif</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="service_id" value="{{$id}}">
                            {{ csrf_field() }}
                        </form>

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
                <a href="{{url('/create-space/baths')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addLocationNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection