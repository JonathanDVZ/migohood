<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <div style="display: none;">
                    <form id="formBackToPlaceType" method="POST" action="{{ url('create-space/place-type') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>
                <li><a class="@if(strcmp($activo,'placetype')==0) activo @endif backToPlaceType">Tipo De Lugar</a></li>
                <div style="display: none;">
                    <form id="formBackToBedrooms" method="POST" action="{{ url('/create-space/bedrooms') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>
                <li><a class="@if(strcmp($activo,'bedrooms')==0) activo  @endif backToBedrooms">Habitaciones</a></li>
                
                <div style="display: none;">
                    <form id="formBackToBathrooms" method="POST" action="{{ url('/create-space/baths') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>
                <li><a class="@if(strcmp($activo,'baths')==0)activo @endif backToBathrooms">Baños</a></li>

                <div style="display: none;">
                    <form id="formBackToLocation" method="POST" action="{{ url('/create-space/location') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>
                <li><a class="@if(strcmp($activo,'location')==0) activo @endif backToLocation">Locación</a></li>
                
                <div style="display: none;">
                    <form id="formBackToAmenities" method="POST" action="{{ url('/create-space/amenities') }}">
                        <input type="hidden" value="{{ $id }}" name="service_id">
                        {{ csrf_field() }}
                    </form>
                </div>
                <li><a class="@if(strcmp($activo,'amenities')==0) activo @endif backToAmenities" >Comodidades</a></li>
                <li><a @if(strcmp($activo,'hosting')==0) class="activo" @endif href="{{url('/create-space/hosting')}}">Alojamiento</a></li>
                <li><a @if(strcmp($activo,'basics')==0) class="activo" @endif href="{{url('/create-space/basics')}}">Esencial</a></li>
                <li><a @if(strcmp($activo,'listing')==0) class="activo" @endif href="{{url('/create-space/listing')}}">Listado</a></li>
                <li><a @if(strcmp($activo,'photos')==0) class="activo" @endif href="{{url('/create-space/photos')}}">Fotos</a></li>
                <li><a @if(strcmp($activo,'services')==0) class="activo" @endif href="{{url('/create-space/services')}}">Servicios</a></li>
                <li><a @if(strcmp($activo,'notes')==0) class="activo" @endif href="{{url('/create-space/notes')}}">Notas</a></li>
            </ul>
        </div>
    </nav>
</div>

