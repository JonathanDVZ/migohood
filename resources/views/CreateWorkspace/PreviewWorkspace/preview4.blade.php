@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">
  
{{--@include('partials.slider')--}}
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding-right">
            <div id="carousel" class="carousel slide" data-ride="carousel">
               
                
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="{{asset('assets/img/fondofs1.png')}}" alt=""  />
                    </div>
                    <div class="item ">
                        <img class="img-responsive" src="{{asset('assets/img/fondofs1.png')}}" alt=""  />
                    </div>
                </div>
              
                <a href="#carousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a href="#carousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                
                </div>
            </div>
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nopadding-left">
            <div class="bootstrap-iso BlueBack">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h4 class="textwhite lilpadding2">$14 Por Noche </h4>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 nopadding">
                        <a href="">
                            <img class="edit2" src="{{url('/assets/img/Icon-Edit-white.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="bootstrap-iso WhiteBack">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <br>
                            <div class="form-group">
                                <span for="chekin">Check-in</span>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input id="chekin" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <br>
                            <div class="form-group">
                                <span for="checkout">Check-out</span>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input id="chekout" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <span for="selectGuest">Invitados</span>
                    <select id="selectGuest" class="selectpicker form-control required">
                                    <option>1 Invitado</option>
                                    <option>2 Invitado</option>
                                    <option>3 Invitado</option>
                                    <option>4 Invitado</option>
                                    <option>5 Invitado</option>
                                </select>
                    <br>
                    <br>
                    <div class="text-center">
                        <button type="button" class="btn btn-large">Agendala Ahora</button>
                        <br>
                        <p>No se efectuara el cobro aun</p>
                        <button type="button" class="btn btn-large">Guardar en la Lista de Deseos</button>
                        <br>
                        <br>
                        <div class="text-center">
                            <a href=""><img class="lilimg2" src="{{url('/assets/img/Icon-Facebook.png')}}" alt=""></a>
                            <a href=""><img class="lilimg" src="{{url('/assets/img/Icon-Mail.png')}}" alt=""></a>
                            <a href=""><img class="lilimg" src="{{url('/assets/img/Icon-Twitter.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('CreateWorkspace.PreviewWorkspace.navbar.preview-navbar',['activo2' => 'preview4'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div style="margin: 1em;">
                <h3 style="color:#0093b4">The Neigborhood</h3>
                <span>Username's </span> <span>place is lcoated in</span><span> Barcelona, Spain</span>
            </div>

            <div id="googleMap" style="width:90%;height:250px;margin:1.5em;"></div>
            <hr style="color:#ccc; margin: auto 1em;">
            <h5 style="color:#0093b4; margin: 1em;">Similar Listing</h5>
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
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
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