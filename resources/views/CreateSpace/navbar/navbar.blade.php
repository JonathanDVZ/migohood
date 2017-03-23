<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a @if(strcmp($activo,'placetype')==0) class="activo" @endif href="{{url('/create-space/place-type')}}">Tipo De Lugar</a></li>
                <li><a @if(strcmp($activo,'bedrooms')==0) class="activo" @endif href="{{url('/create-space/bedrooms')}}">Habitaciones</a></li>
                <li><a @if(strcmp($activo,'baths')==0) class="activo" @endif href="{{url('/create-space/baths')}}">Baños</a></li>
                <li><a @if(strcmp($activo,'location')==0) class="activo" @endif href="{{url('/create-space/location')}}">Locación</a></li>
                <li><a @if(strcmp($activo,'amenities')==0) class="activo" @endif href="{{url('/create-space/amenities')}}">Comodidades</a></li>
                <li><a @if(strcmp($activo,'hosting')==0) class="activo" @endif href="{{url('/create-space/hosting')}}">Alojamiento</a></li>
                <li><a @if(strcmp($activo,'basics')==0) class="activo" @endif href="{{url('/create-space/basics')}}">Esencial</a></li>
                <li><a @if(strcmp($activo,'listing')==0) class="activo" @endif href="{{url('/create-space/listing')}}">Listado</a></li>
                <li><a @if(strcmp($activo,'photos')==0) class="activo" @endif href="{{url('/create-space/photos')}}">Fotos</a></li>
                <li><a @if(strcmp($activo,'services')==0) class="activo" @endif href="{{url('/create-space/services')}}">Servicios</a></li>
            </ul>
        </div>
    </nav>
</div>