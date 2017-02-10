@extends('layouts.master')
@section('content')
<div id="Div1" class="text-center center-block">
    <img id="img1" class="img-responsive" src="{{url('/assets/img/Fondo.png')}}" alt="">
    <h1 class="text-center">YOUR IDEAL <strong>SPACE</strong></h1>
    <div id="divSearch">
        <form id="formBuscar" class="form-inline text-center">
            <div class="form-group text-center">
            <select class="form-control">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="fiat">Fiat</option>
            <option value="audi">Audi</option>
            </select>
            <input type="text" class="form-control">
            <input type="text" class="form-control" placeholder="APARTMENTS,HOUSE, B&B">
            <button type="button" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 text-center"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-center"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-center"></div>
        </div>
    </div>
    <img id="img2" class="img-responsive" src="{{url('/assets/img/HowWorks.png')}}" alt="">
</div>
<div id="Div2" class="text-center center-block img-responsive"> 
            <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                <img id="phone" class="img-responsive" src="{{url('/assets/img/Phone.png')}}" alt="">
                <div class="list-inline">
                <h1>CLUB</h1>
                <h2>migohood</h2>      
                <a href="#" class="btn btn-default">Register</a>              
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center"></div>
</div>

@endsection
