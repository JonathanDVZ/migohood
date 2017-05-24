<div class="barra4">
    <nav class="navbar navbar-default navibar4 nopadding" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered2">
                <li><a @if(strcmp($activo2,'preview1')==0) class="activo2" @endif href="{{url('/create-space/preview-overview')}}">Overview</a></li>
                <li><a @if(strcmp($activo2,'preview2')==0) class="activo2" @endif href="{{url('/create-space/preview-reviews')}}">Reviews</a></li>
                <li><a @if(strcmp($activo2,'preview3')==0) class="activo2" @endif href="{{url('/create-space/preview-host')}}">Host</a></li>
                <li><a @if(strcmp($activo2,'preview4')==0) class="activo2" @endif href="{{url('/create-space/preview-location')}}">Location</a></li>
            </ul>
        </div>
    </nav>
</div>