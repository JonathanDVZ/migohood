<div class="barra4">
    <nav class="navbar navbar-default navibar4 nopadding" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered2">
                <li><a @if(strcmp($activo2,'preview1')==0) class="activo2" @endif href="{{url('/create-parking/preview-overview')}}">Resumen</a></li>
                <li><a @if(strcmp($activo2,'preview2')==0) class="activo2" @endif href="{{url('/create-parking/preview-reviews')}}">Evaluaciones</a></li>
                <li><a @if(strcmp($activo2,'preview3')==0) class="activo2" @endif href="{{url('/create-parking/preview-host')}}">Anfitrión</a></li>
                <li><a @if(strcmp($activo2,'preview4')==0) class="activo2" @endif href="{{url('/create-parking/preview-location')}}">Locación</a></li>
            </ul>
        </div>
    </nav>
</div>