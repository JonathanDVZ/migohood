@extends('layouts.master') @section('content')
<a name="about"></a>
<div class="intro-header">
    <div class="container">
        <div class="row este">
            <div class="col-lg-12">
                <h1 class="text-center">YOUR IDEAL <strong>PLACE</strong></h1>
                <div id="divSearch">


                    <form id="formBuscar" class="form-inline text-center">
                        <div class="row buscar">
                            <div class="col-lg-6 col-md-6 col-sm-12 text-center searchforms">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <input type="text" class="form-control" aria-label="...">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-center searchforms">
                                <input type="text" class="form-control control2" placeholder="APARTMENTS,HOUSE, B&B">
                                <button type="button" class="btn btn-md works control3"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center"></div>
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center"></div>
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center"></div>
                    </div>
                </div>
                <a type="button" class="btn btn-lg works" href=""><strong>     HOW IT WORKS     </strong></a>
                <div class="row headerRow">
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center ">
                        <h2>Discover your destination</h2>
                        <img class="img-responsive imgs" src="{{url('/assets/img/How1.png')}}" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center ">
                        <h2>Book your stay</h2>
                        <img class="img-responsive imgs" src="{{url('/assets/img/How2.png')}}" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center ">
                        <h2>Discover your ideal space</h2>
                        <img class="img-responsive imgs" src="{{url('/assets/img/How3.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="content-section-b">

    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-6">
                <img class="img-responsive" src="{{url('/assets/img/Mano_y_Movil.png')}}" alt="">
                <div class="clearfix"></div>
                <h2 class="migo">Club</h2>
                <h3 class="">migohood</h3>
                <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop
                    actions!
                </p>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6">
                <img class="img-responsive" src="{{url('/assets/img/Mapa.png')}}" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>

<a name="contact"></a>
<div class="banner">

    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <h2>Connect to Start Bootstrap:</h2>
            </div>
            <div class="col-lg-6">
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.banner -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
@endsection