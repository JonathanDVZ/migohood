<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a @if(strcmp($activo,'placetype')==0) class="activo" @endif href="{{url('/create-workspace/place-type')}}">Tipo De Lugar</a></li>
                <li><a @if(strcmp($activo,'bedrooms')==0) class="activo" @endif href="{{url('/create-workspace/bedrooms')}}">Habitaciones</a></li>
                <li><a @if(strcmp($activo,'baths')==0) class="activo" @endif href="{{url('/create-workspace/baths')}}">Baños</a></li>
                <li><a @if(strcmp($activo,'location')==0) class="activo" @endif href="{{url('/create-workspace/location')}}">Locación</a></li>
                <li><a @if(strcmp($activo,'amenities')==0) class="activo" @endif href="{{url('/create-workspace/amenities')}}">Comodidades</a></li>
                <li><a @if(strcmp($activo,'hosting')==0) class="activo" @endif href="{{url('/create-workspace/hosting')}}">Alquiler</a></li>
                <li><a @if(strcmp($activo,'basics')==0) class="activo" @endif href="{{url('/create-workspace/basics')}}">Esencial</a></li>
                <li><a @if(strcmp($activo,'listing')==0) class="activo" @endif href="{{url('/create-workspace/listing')}}">Publicación</a></li>
                <li><a @if(strcmp($activo,'photos')==0) class="activo" @endif href="{{url('/create-workspace/photos')}}">Fotos</a></li>
                <li><a @if(strcmp($activo,'services')==0) class="activo" @endif href="{{url('/create-workspace/services')}}">Servicios</a></li>
                <li><a @if(strcmp($activo,'notes')==0) class="activo" @endif href="{{url('/create-workspace/notes')}}">Notas</a></li>
                <li><a @if(strcmp($activo,'co-host')==0) class="activo" @endif href="{{url('/create-workspace/co-host')}}">Co-Host</a></li>
            </ul>
        </div>
    </nav>
</div>

