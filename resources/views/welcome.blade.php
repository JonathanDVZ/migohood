@extends('layouts.master') 
@section('title', 'Home') 
@section('content')
<div>
<div class="container-fluid first">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 nopadding ">
            <div class="row">
                <div class="col-lg-3 col-3-md col-3-sm text-center"></div>
                <div class="col-lg-6 col-6-md col-6-sm col-xs-12 text-center list-inline">
                    <img class="img-responsive videoi" src="{{url('/assets/img/Play.png')}}" alt="">
                </div>
                <div class="col-lg-3 col-3-md col-3-sm text-center"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                    <div class="row buscar ">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-center insideB">
                            <div class="form-group">
                                <select size="" class="selectpicker form-control action" data-live-search="true">
                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                            </select>
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
            <div class="text-center how">
                <a type="button" class="btn btn-lg works text-center" href=""><strong>     HOW IT WORKS     </strong></a>
            </div>
            <div class="row headerRow">
                <div class="col-lg-1 col-md-1 col-sm-1 "></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 text-center">
                    <img class="img-responsive text-center center-block" src="{{url('/assets/img/HoWork.png')}}" alt="">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 "></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid second">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                    <img class="img-responsive hoWork" src="{{url('assets/img/TELEFONO-10.png')}}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center circu">
                    <img class="img-responsive center-block circulo" src="{{url('assets/img/Circulo.png')}}" alt="">

                    <div class="texto center-block">
                        <h2 class="azul">LOREM IPSUM</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero est, vel, repudiandae a laboriosam inventore impedit fugiat accusamus omnis, vero unde non eligendi. Beatae saepe, laboriosam sapiente corporis similique molestiae.</p>
                    </div>

                    <div class="list-inline">
                        <a href="" type="button"><img src="{{url('/assets/img/AppStore.png')}}" class="img-responsive list-inline imgs" alt=""></a>
                        <a href="" type="button"><img src="{{url('/assets/img/GooglePlus.png')}}" class="img-responsive list-inline imgs" alt=""></a>
                    </div>
                </div>
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
<div></div></div></div>
@endsection