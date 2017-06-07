<header>
    <nav id="navibar2" class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
                <a class="navbar-brand" href="{{url('/')}}"><img class="img-responsive logito" src="{{url('/assets/img/WhiteMiniLogo.png')}}" alt="Migohood Logo">
                </a>
            </div>
            <div id="#navbar2" class="navbar-collapse collapse text-center">
                <form id="SearchF" class="navbar-form navbar-left SearchB">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm btn-small" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                        <input type="text" class="form-control input-sm navSearch" placeholder="Buscar">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="divbtnbar"><a href="{{url('/becomeahost')}}" class="btn btnbar2" role="button"><strong>Conviertete en Host</strong></a></div>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><img src="{{url('/assets/img/Plane.png')}}" alt=""></a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><img src="{{url('/assets/img/Paper.png')}}" alt=""></a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><img src="{{url('/assets/img/Bell.png')}}" alt=""></a>
                    </li>
                    <li class="dropdown dropdown-normal">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img-circle" src="{{ session()->get('user.avatar') }}" alt=""></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/logout') }}">Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>