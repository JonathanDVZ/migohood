<header>
    <div class="barra">
        <nav id="navibar" class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img class="img-responsive" src="{{url('/assets/img/Logo.png')}}" alt="Migohood Logo">
                    </a>
                </div>
                <div id="navbar3" class="navbar-collapse collapse text-center">
                    <div class="buscador">
                        <form class="navbar-form navbar-left SearchB">
                            <div class="input-group">
                                <span class="input-group-btn">
                                                <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </span>
                                <input type="text" class="form-control input-sm navSearch" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-nav navbar-right navright">
                        <li><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li><a class="nav-link" href="#">Category</a></li>
                        <li><a class="nav-link" href="#">Featured</a></li>
                        <li><a class="nav-link" href="{{url('/accessuser')}}">Sign in</a></li>
                        <li>
                            <div class="divbtnbar"><a href="{{url('/registeruser')}}" class="btn btnbar" role="button"><strong>Register</strong></a></div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">USD<span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li><a href="#">COP</a></li>
                                <li><a href="#">VEF</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>