@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">

    @include('partials.slider')
    
    @include('CreateService.PreviewService.navbar.preview-navbar',['activo2' => 'preview4'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div style="margin: 1em;">
                  <h3 style="color:#0093b4">The Neigborhood</h3>
                 
                 <span>Username's </span> <span>place is lcoated in</span><span> {{$overview4["city"]}} {{$overview4["state"]}} , {{$overview4["country"]}}</span> 
            </div>

            <div class="col-xs-12 col-sm-12" id="googleMap" style="width:95%;height:250px;margin:1.5em; margin-left: 3%;">
            <input type="hidden" name="latitude" id="latitude" value="@if(isset($latitude['content']) AND !empty($latitude['content'])){{ $latitude['content'] }}@endif">
            <input type="hidden" name="longitude" id="longitude" value="@if(isset($longitude['content']) AND !empty($longitude['content'])){{ $longitude['content'] }}@endif">
            <input type="hidden" name="service_id" value="$data['service_id']">
                            {{ csrf_field() }}
            </div>
            <hr style="color:#ccc; margin: auto 1em;">
            <h3 style="color:#0093b4; margin-left: 1em;">Servicios similares</h3>
            <hr class="black">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div id="carousel" class="carousel slide lilcarrousel2" data-ride="carousel">
                    <div class="carousel-inner carrousel22">
                        <div class="item active">
                            <img class="img-responsive img2" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                        </div>
                        <div class="item">
                            <img class="img-responsive img2" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 2" />
                        </div>
                        <div class="item">
                            <img class="img-responsive img2" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 3" />
                        </div>
                    </div>
                    <a href="#carousel-example-generic" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#carousel-example-generic" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 text-center">
                    <h5 class="RetNex2" style="color:#0093b4; margin: 1em;">Warm Bedroom</h5>
                    <span class="RetNex2"><strong>5$</strong></span>
                    <br>
                    <span>Private Room |</span>
                    <span>2 Beds |</span>
                    <span>2 Guest</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div id="carousel" class="carousel slide lilcarrousel2" data-ride="carousel">
                    <div class="carousel-inner carrousel22">
                        <div class="item active">
                            <img class="img-responsive img2" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                        </div>
                        <div class="item">
                            <img class="img-responsive img2" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 2" />
                        </div>
                        <div class="item">
                            <img class="img-responsive img2" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 3" />
                        </div>
                    </div>
                    <a href="#carousel-example-generic" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#carousel-example-generic" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 text-center">
                    <h5 class="RetNex2" style="color:#0093b4; margin: 1em;">Warm Bedroom</h5>
                    <span class="RetNex2"><strong>5$</strong></span>
                    <br>
                    <span>Private Room |</span>
                    <span>2 Beds |</span>
                    <span>2 Guest</span>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection