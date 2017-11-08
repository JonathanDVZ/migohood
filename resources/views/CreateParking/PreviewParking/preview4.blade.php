@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">

    @include('partials.slider')
    
    @include('CreateParking.PreviewParking.navbar.preview-navbar',['activo2' => 'preview4'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 light-border">
            <div style="margin: 1em;">
                <h3 style="color:#0093b4">The Neigborhood</h3>
                <span>Username's </span> <span>place is lcoated in</span><span> {{$overview4["city"]}} {{$overview4["state"]}} , {{$overview4["country"]}}</span>
            </div>

            <div id="googleMap" class="googglemap-config">
            <input type="hidden" name="latitude" id="latitude" value="@if(isset($latitude['content']) AND !empty($latitude['content'])){{ $latitude['content'] }}@endif">
            <input type="hidden" name="longitude" id="longitude" value="@if(isset($longitude['content']) AND !empty($longitude['content'])){{ $longitude['content'] }}@endif">
            <input type="hidden" name="service_id" value="$data['service_id']">
            </div>
                            {{ csrf_field() }}
            <hr style="color:#ccc; margin: auto 1em;">
            <h4 style="color:#0093b4; margin: 1em;">Aparcamientos similares</h4>
            <hr class="black">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner carrousel22" role="listbox">
                    <div class="item active">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                 <div class="text-center">
                    <h5 class="RetNex2" style="color:#0093b4; margin: 1em;">Warm Bedroom</h5>
                    <span class="RetNex2"><strong>5$</strong></span>
                    <br>
                    <span>Private Room |</span>
                    <span>2 Beds |</span>
                    <span>2 Guest</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner carrousel22" role="listbox">
                    <div class="item active">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <div class="text-center">
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