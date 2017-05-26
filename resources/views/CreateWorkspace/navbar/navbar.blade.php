<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a @if(strcmp($activo5,'placetype')==0) class="activo5" @endif href="{{url('/create-workspace/place-type')}}">Tipo De Lugar</a></li>
                <li><a @if(strcmp($activo5,'bedrooms')==0) class="activo5" @endif href="{{url('/create-workspace/bedrooms')}}">Habitaciones</a></li>
                <li><a @if(strcmp($activo5,'baths')==0) class="activo5" @endif href="{{url('/create-workspace/baths')}}">Baños</a></li>
                <li><a @if(strcmp($activo5,'location')==0) class="activo5" @endif href="{{url('/create-workspace/location')}}">Locación</a></li>
                <li><a @if(strcmp($activo5,'amenities')==0) class="activo5" @endif href="{{url('/create-workspace/amenities')}}">Comodidades</a></li>
                <li><a @if(strcmp($activo5,'hosting')==0) class="activo5" @endif href="{{url('/create-workspace/hosting')}}">Alquiler</a></li>
                <li><a @if(strcmp($activo5,'basics')==0) class="activo5" @endif href="{{url('/create-workspace/basics')}}">Esencial</a></li>
                <li><a @if(strcmp($activo5,'listing')==0) class="activo5" @endif href="{{url('/create-workspace/listing')}}">Publicación</a></li>
                <li><a @if(strcmp($activo5,'photos')==0) class="activo5" @endif href="{{url('/create-workspace/photos')}}">Fotos</a></li>
                <li><a @if(strcmp($activo5,'services')==0) class="activo5" @endif href="{{url('/create-workspace/services')}}">Servicios</a></li>
                <li><a @if(strcmp($activo5,'notes')==0) class="activo5" @endif href="{{url('/create-workspace/notes')}}">Notas</a></li>
            </ul>
        </div>
    </nav>
</div>

