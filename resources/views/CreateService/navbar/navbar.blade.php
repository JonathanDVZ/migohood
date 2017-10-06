<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a @if(strcmp($activo,'category')==0) class="activo" @endif href="{{url('/create-service/category')}}">Categoria</a></li>
                <li><a @if(strcmp($activo,'hosting')==0) class="activo" @endif href="{{url('/create-service/hosting')}}">Alojamiento</a></li>
                <li><a @if(strcmp($activo,'basics')==0) class="activo" @endif href="{{url('/create-service/basics')}}">Esencial</a></li>
                <li><a @if(strcmp($activo,'photos')==0) class="activo" @endif href="{{url('/create-service/photos')}}">Fotos</a></li>
                <li><a @if(strcmp($activo,'location')==0) class="activo" @endif href="{{url('/create-service/location')}}">Ubicación</a></li>
                <li><a @if(strcmp($activo,'notes')==0) class="activo" @endif href="{{url('/create-service/notes')}}">Notas</a></li>
                <li><a @if(strcmp($activo,'co-host')==0) class="activo" @endif href="{{url('/create-service/co-host')}}">Co-Host</a></li>
            </ul>
        </div>
</div>

