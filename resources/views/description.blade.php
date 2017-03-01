@extends('layouts.master') @section('title', 'Description') @section('content')
<div class="container text-center description">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-10 ">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 list-inline">
                    <h4>Description</h4>
                    <div class="text-left">
                        <button type="submit" class="btn btn-default">Modify</button>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"></div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>

    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-default addmore text center"><i class="fa fa-plus" aria-hidden="true"></i> Add more photos</button>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-default continue text center">CONTINUE</button>
    </div>
    <img src="{{url('/assets/img/fondobah2.png')}}" alt="">
</div>
@endsection @section("footer") @endsection