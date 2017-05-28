@extends('layouts.master') 
@section('title', 'Bedrooms') 
@section('class', 'contenedor') 
@section( 'content')
@include('CreateParking.navbar.navbar',['activo' => 'bedrooms'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <div class="col-lg-8 col-md-9 col-lg-offset-2 col-md-offset-1">
                    <br>
                    <h3 class="titulo text-center">DETALLES DE LA ESTADIA</h3>
                    <hr>
                    <!-- Agregado for para mostrar el numero de habitaciones segun el numero ingresado 
                    previamente por el cliente -->
                    @for($i = 0; $i < count($bedrooms); $i++)
                        <div>
                            <form id="form{{ $i }}" method="POST" action="{{ url('/create-space/bedrooms/edit-bedrooms/add-bed') }}">
                                <div class="titulos">
                                    <span>Habitacion {{ $i+1 }}</span>
                                    <input type="hidden" value="{{ $bedrooms[$i]['bedroom_id'] }}" name="bedroom_id">
                                    <input type="hidden" value="{{ $id }}" name="service_id">
                                    <input type="hidden" value="{{ $i }}" name="refer">
                                    {{ csrf_field() }}
                                    <br>
                                    <span>{{ $bedrooms[$i]['bed_quantity'] }} Camas</span>
                                </div>
                                <div class="titulos">

                                    <a id="{{ $i }}" class="btn btn-sm continue addBed" role="button">Agregar Camas</a>
                                </div>
                            </form>
                        </div>
                        <hr>
                    @endfor

                    <form id="formAddBathrooms" method="POST" action="{{ url('/create-space/baths/show-bathroom') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>El numero y el tipo de camas disponibles, determinaran el numero de huespedes que pueden quedarse comodamente en tu espacio</p>
                <br>

                <p>El detalle de las camas ayuda a entender como esta organizado tu espacio.</p>
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
                <a href="{{url('/create-space/bedrooms')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addBathroomsNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection