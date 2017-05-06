<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <div style="display: none;">
                    <!--<form id="formBackToPlaceType" method="POST" action="{{ url('create-space/place-type') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>-->
                </div>
                <li><a href="{{ url('create-space/place-type') }}" class="@if(strcmp($activo,'placetype')==0) activo @endif">Tipo De Lugar</a></li>
                <!--<div style="display: none;">
                    <form id="formBackToBedrooms" method="POST" action="{{ url('/create-space/bedrooms') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>-->
                <li><a href="{{ url('/create-space/bedrooms') }}" class="@if(strcmp($activo,'bedrooms')==0) activo  @endif">Habitaciones</a></li>
                
                <!--<div style="display: none;">
                    <form id="formBackToBathrooms" method="POST" action="{{ url('/create-space/baths') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>-->
                <li><a href="{{ url('/create-space/baths') }}" class="@if(strcmp($activo,'baths')==0)activo @endif">Baños</a></li>

                <!--<div style="display: none;">
                    <form id="formBackToLocation" method="POST" action="{{ url('/create-space/location') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>-->
                <li><a href="{{ url('/create-space/location') }}" class="@if(strcmp($activo,'location')==0) activo @endif">Locación</a></li>
                
                <!--<div style="display: none;">
                    <form id="formBackToAmenities" method="POST" action="{{ url('/create-space/amenities') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>-->
                <li><a href="{{ url('/create-space/amenities') }}" class="@if(strcmp($activo,'amenities')==0) activo @endif">Comodidades</a></li>
                
                <!--<div style="display: none;">
                    <form id="formBackToHosting" method="POST" action="{{ url('/create-space/hosting') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>-->
                <li><a href="{{ url('/create-space/hosting') }}" class="@if(strcmp($activo,'hosting')==0) activo @endif">Alojamiento</a></li>
                <li><a @if(strcmp($activo,'basics')==0) class="activo" @endif href="{{url('/create-space/basics')}}">Esencial</a></li>
                <li><a @if(strcmp($activo,'listing')==0) class="activo" @endif href="{{url('/create-space/listing')}}">Listado</a></li>
                <li><a @if(strcmp($activo,'photos')==0) class="activo" @endif href="{{url('/create-space/photos')}}">Fotos</a></li>
                <li><a @if(strcmp($activo,'services')==0) class="activo" @endif href="{{url('/create-space/services')}}">Servicios</a></li>
                <li><a @if(strcmp($activo,'notes')==0) class="activo" @endif href="{{url('/create-space/notes')}}">Notas</a></li>
            </ul>
        </div>
    </nav>
</div>

