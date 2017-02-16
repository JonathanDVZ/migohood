@extends('layouts.master')
@section('title', 'Home') 
@section('content')
<div class="container-fluid first">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 nopadding ">
            <h1 class="text-center">YOUR IDEAL <strong>PLACE</strong></h1>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                    <div class="row buscar ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center insideB">
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
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center insideB">
                            <input type="text" class="form-control action" placeholder="APARTMENTS,HOUSE, B&B">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center insideB">
                            <button type="button" class="btn btn-md works"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-1"></div>
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
</div>

<div class="content-section-b">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 nopadding">
                <img class="img-responsive" src="{{url('/assets/img/Mano_y_Movil.png')}}" alt="">
                <div class="clearfix"></div>
                <h2 class="migo">Club</h2>
                <h1 class="hood">migohood</h1>
                <a href="{{url('/registeruser')}}" type="button" class="btn btn-lg regBtn"><strong>Register</strong></a>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 nopadding">
                <h1 class="migo">migohood</h1>
                <h2 class="hood">MOBILE APP.</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis inventore ipsa, molestiae suscipit adipisci, maxime ab, qui deserunt facere amet voluptas, illum aliquam consectetur. Sint, nobis tempore nisi. Expedita, dolorum.</p>
                <img class="img-responsive" src="{{url('/assets/img/Mapa.png')}}" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
</div>

@endsection @section("footer") @endsection