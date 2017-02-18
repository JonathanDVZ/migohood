@extends('layouts.master') @section('title', 'Home') @section('content')
<div class="container-fluid first">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 nopadding ">
            <h1 class="text-center">YOUR IDEAL <strong>PLACE</strong></h1>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                    <div class="row buscar ">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-center insideB">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <input type="text" class="form-control action" aria-label="...">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-center insideB">
                            <input type="text" class="form-control action" placeholder="APARTMENTS,HOUSE, B&B">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center insideB">
                            <button type="button" class="btn btn-md works"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-1"></div>
            </div>
        </div>
    </div>
    <div class="text-center how">
        <a type="button" class="btn btn-lg works text-center" href=""><strong>     HOW IT WORKS     </strong></a>
    </div>
    <div class="row headerRow">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center ">
            <h2>Discover your destination</h2>
            <img class="img-responsive imgs" src="{{url('/assets/img/How1.png')}}" alt="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
            <h2>Book your stay</h2>
            <img class="img-responsive imgs" src="{{url('/assets/img/How2.png')}}" alt="">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
            <h2>Discover your ideal space</h2>
            <img class="img-responsive imgs" src="{{url('/assets/img/How3.png')}}" alt="">
        </div>
    </div>
</div>

<div class="container-fluid second">

    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 nopadding">
            <img class="img-responsive cel" src="{{url('/assets/img/Mano_y_Movil.png')}}" alt="">
            <div class="clearfix"></div>
            <div class="text-left titulos">
                <h2 class="migo">Club</h2>
                <h1 class="hood">migohood</h1>
            </div>
            <a href="{{url('/registeruser')}}" type="button" class="btn btn-lg regBtn"><strong>Register</strong></a>
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 nopadding">
            <div class="text-left">
                <h1 class="migo">migohood</h1>
                <h2 class="hood">MOBILE APP. </h2>
            </div>
            <p class="text-justify parra">It offer all the key functionality of migohood.com plus conveniente GPS-based features and even more usefull advantages once you open a migohood account </p>
            <img class="img-responsive map" src="{{url('/assets/img/Mapa.png')}}" alt="">
        </div>
    </div>

</div>
<div class="container-fluid last">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
        <div class="col-lg-3 col-md- col-sm-3 col-xs-12 text-center list-inline">
            <a href=""><img src="{{url('/assets/img/FacebookB.png')}}" alt="Facebook Page"></a>
            <a href=""><img src="{{url('/assets/img/GoogleP.png')}}" alt="Google Plus account"></a>
            <a href=""><img src="{{url('/assets/img/Instagram.png')}}" alt=" Instagram Page"></a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
            <br>
            <a href="https://www.migohood.com/" class="">www.migohood.com</a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center"></div>
    </div>
</div>

@endsection @section("footer") @endsection