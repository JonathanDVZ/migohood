<div class="barra4">
    <nav class="navbar navbar-default navibar4 no padding" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered2">
                <li><a @if(strcmp($activo2,'preview1')==0) class="activo2" @endif href="{{url('/create-space/place-type')}}">Overview</a></li>
                <li><a @if(strcmp($activo2,'preview2')==0) class="activo2" @endif href="{{url('/create-space/bedrooms')}}">Reviews</a></li>
                <li><a @if(strcmp($activo2,'preview3')==0) class="activo2" @endif href="{{url('/create-space/baths')}}">The Host</a></li>
                <li><a @if(strcmp($activo2,'preview4')==0) class="activo2" @endif href="{{url('/create-space/location')}}">Location</a></li>
            </ul>
        </div>
    </nav>
</div>