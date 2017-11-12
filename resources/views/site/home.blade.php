@extends('layouts.master') @section('title', 'Home') @section('content')
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
                                        <option data-tokens="espacio">Espacio</option>
                                        <option data-tokens="servicio">Servicio</option>
                                        <option data-tokens="aparcamiento estacionamiento">Aparcamiento</option>
                                        <option data-tokens="trabajo">Lugar de Trabajo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-center insideB">
                                <input type="text" class="form-control action" placeholder="Apartamentos, casas, aparcamiento">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center insideB">
                                <button type="button" class="btn btn-md works"><i class="fa fa-search" aria-hidden="true"></i> BUSCAR</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-1"></div>
                </div>
                <br><br>

                    <!-- Empiezan Secciones (1era seccion) -->

            <div class="container hidden-xs first-seccion">
                <div class="row">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <h2 class="title-text-box">Espacio habitable</h2>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <!-- Controls -->
                            @if(count($space) > 4)
                            <div class="controls pull-right">
                                <a class="left fa fa-chevron-left btn btn-info" href="#carousel-example1"
                                    data-slide="prev"></a>
                                <a class="right fa fa-chevron-right btn btn-info" href="#carousel-example1"
                                    data-slide="next"></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div id="carousel-example1" class="carousel slide" data-ride="carousel" data-interval="0">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                                @if(isset($space) AND !empty($space) AND $space !='Not Found')
                                @foreach(array_chunk($space,4,2) as $keys => $chunk)
                                @if($keys == 0)
                            <div class="item active">
                                <div class="row">
                                @foreach($chunk as $value)
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div>
                                                <div class="button-home-more ">
                                                    <form action="{{url('/create-space/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="row">
                                    @foreach($chunk as $value)
                                     <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div><br>
                                                <div class="button-home-more">
                                                    <form action="{{url('/create-space/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
            </div>

        <!-- Seccion en responsive (1era seccion) -->
                
        <div class="container hidden-md hidden-sm hidden-lg">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title-text-box" >Espacio habitable</h2>
                </div>
            </div>
        </div>
            <div id="carousel-example-generic1" class="carousel slide  hidden-sm hidden-md hidden-lg" data-ride="carousel" data-interval="0">
              <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @if(isset($space) AND !empty($space) AND $space !='Not Found')
                @foreach($space as $keys => $value)
                @if($keys == 0)
                <div class="item active">
                  <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
                  <div class="text-limit2">
                    <h4 class="text-justify">{{$value['title']}}</h4>
                </div>
                <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                <div class="position-star2"> 
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div><br>
                <div class="button-home-more2">
                   <form action="{{url('/create-space/preview-overview')}}" method="GET">
                        {{csrf_field()}}
                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                        <button type="submit" class="btn btn-primary">ver mas</button>
                    </form>
                </div>
                <div class="clearfix">
                </div>
            </div>

            @else

            <div class="item">
              <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
              <div class="text-limit2">
                <h4 class="text-justify">{{$value['title']}}</h4>
            </div>
            <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
            <div class="position-star2">    
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
            </div><br>
            <div class="button-home-more2">
                <form action="{{url('/create-space/preview-overview')}}" method="GET">
                    {{csrf_field()}}
                    <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                    <button type="submit" class="btn btn-primary">ver mas</button>
                </form>
            </div>
            <div class="clearfix">
            </div>
        </div>
        @endif
        @endforeach
        @endif  
</div>

<!-- Controls -->
<a class="left carousel-control control-home2" href="#carousel-example-generic1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control control-home2" href="#carousel-example-generic1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div> 
 

                 <!-- Secciones  (2era seccion) -->

            <div class="container hidden-xs first-seccion">
                <div class="row">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <h2 class="title-text-box">Aparcamiento</h2>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <!-- Controls -->
                            @if(count($parking) > 4)
                            <div class="controls pull-right">
                                <a class="left fa fa-chevron-left btn btn-info" href="#carousel-example2"
                                    data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-info" href="#carousel-example2"
                                        data-slide="next"></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div id="carousel-example2" class="carousel slide" data-ride="carousel" data-interval="0">
                       
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                                @if(isset($parking) AND !empty($parking) AND $parking !='Not Found')
                                @foreach(array_chunk($parking,4,2) as $keys => $chunk)
                                @if($keys == 0)
                            <div class="item active">
                                <div class="row">
                                @foreach($chunk as $value)
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div><br>
                                                <div class="button-home-more">
                                                    <form action="{{url('/create-parking/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="row">
                                    @foreach($chunk as $value)
                                     <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div><br>
                                                <div class="button-home-more">
                                                    <form action="{{url('/create-parking/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
            </div>

        <!-- Seccion 2 responsive -->
                
        <div class="container hidden-md hidden-sm hidden-lg">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title-text-box" >Aparcamiento</h2>
                </div>
            </div>
        </div>
            <div id="carousel-example-generic2" class="carousel slide  hidden-sm hidden-md hidden-lg" data-ride="carousel" data-interval="0">
               <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @if(isset($parking) AND !empty($parking) AND $parking !='Not Found')
                @foreach($parking as $keys => $value)
                @if($keys == 0)
                <div class="item active">
                  <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
                  <div class="text-limit2">
                    <h4 class="text-justify">{{$value['title']}}</h4>
                </div>
                <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                <div class="position-star2"> 
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div><br>
                <div class="button-home-more2">
                   <form action="{{url('/create-parking/preview-overview')}}" method="GET">
                        {{csrf_field()}}
                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                        <button type="submit" class="btn btn-primary">ver mas</button>
                    </form>
                </div>
                <div class="clearfix">
                </div>
            </div>

            @else

            <div class="item">
              <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
              <div class="text-limit2">
                <h4 class="text-justify">{{$value['title']}}</h4>
            </div>
            <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
            <div class="position-star2">    
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
            </div><br>
            <div class="button-home-more2">
                <form action="{{url('/create-parking/preview-overview')}}" method="GET">
                    {{csrf_field()}}
                    <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                    <button type="submit" class="btn btn-primary">ver mas</button>
                </form>
            </div>
            <div class="clearfix">
            </div>
        </div>
        @endif
        @endforeach
        @endif  
</div>

<!-- Controls -->
<a class="left carousel-control control-home2" href="#carousel-example-generic2" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control control-home2" href="#carousel-example-generic2" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>  

                             <!-- Secciones  (3era seccion) -->

            <div class="container hidden-xs first-seccion">
                <div class="row">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <h2 class="title-text-box">Servicio</h2>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <!-- Controls -->
                            @if(count($service) > 4)
                            <div class="controls pull-right">
                                <a class="left fa fa-chevron-left btn btn-info" href="#carousel-example3"
                                    data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-info" href="#carousel-example3"
                                        data-slide="next"></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div id="carousel-example3" class="carousel slide" data-ride="carousel" data-interval="0">
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                                @if(isset($service) AND !empty($service) AND $service !='Not Found')
                                @foreach(array_chunk($service,4,2) as $keys => $chunk)
                                @if($keys == 0)
                            <div class="item active">
                                <div class="row">
                                @foreach($chunk as $value)
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div><br>
                                                <div class="button-home-more">
                                                    <form action="{{url('/create-service/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="row">
                                    @foreach($chunk as $value)
                                     <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div><br>
                                                <div class="button-home-more">
                                                    <form action="{{url('/create-service/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
            </div>

        <!-- Seccion  responsive (3ra seccion)-->
                
        <div class="container hidden-md hidden-sm hidden-lg">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title-text-box">Servicio</h2>
                </div>
            </div>
        </div>
            <div id="carousel-example-generic3" class="carousel slide  hidden-sm hidden-md hidden-lg" data-ride="carousel" data-interval="0">
                <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @if(isset($service) AND !empty($service) AND $service !='Not Found')
                @foreach($service as $keys => $value)
                @if($keys == 0)
                <div class="item active">
                  <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
                  <div class="text-limit2">
                    <h4 class="text-justify">{{$value['title']}}</h4>
                </div>
                <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                <div class="position-star2"> 
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div><br>
                <div class="button-home-more2">
                   <form action="{{url('/create-service/preview-overview')}}" method="GET">
                        {{csrf_field()}}
                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                        <button type="submit" class="btn btn-primary">ver mas</button>
                    </form>
                </div>
                <div class="clearfix">
                </div>
            </div>

            @else

            <div class="item">
              <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
              <div class="text-limit2">
                <h4 class="text-justify">{{$value['title']}}</h4>
            </div>
            <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
            <div class="position-star2">    
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
            </div><br>
            <div class="button-home-more2">
                <form action="{{url('/create-service/preview-overview')}}" method="GET">
                    {{csrf_field()}}
                    <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                    <button type="submit" class="btn btn-primary">ver mas</button>
                </form>
            </div>
            <div class="clearfix">
            </div>
        </div>
        @endif
        @endforeach
        @endif  
</div>

<!-- Controls -->
<a class="left carousel-control control-home2" href="#carousel-example-generic3" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control control-home2" href="#carousel-example-generic3" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>  

                 <!-- Secciones  (4rta seccion) -->

            <div class="container hidden-xs first-seccion">
                <div class="row">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <h2 class="title-text-box">Lugar de trabajo</h2>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <!-- Controls -->
                            @if(count($workspace) > 4)
                            <div class="controls pull-right">
                                <a class="left fa fa-chevron-left btn btn-info" href="#carousel-example4"
                                    data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-info" href="#carousel-example4"
                                        data-slide="next"></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div id="carousel-example4" class="carousel slide" data-ride="carousel" data-interval="0">
                       
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                                @if(isset($workspace) AND !empty($workspace) AND $workspace !='Not Found')
                                @foreach(array_chunk($workspace,4,2) as $keys => $chunk)
                                @if($keys == 0)
                            <div class="item active">
                                <div class="row">
                                @foreach($chunk as $value)
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div><br>
                                                <div class="button-home-more">
                                                    <form action="{{url('/create-workspace/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="row">
                                    @foreach($chunk as $value)
                                     <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{asset($value['ruta'])}}" class="img-responsive" alt="{{$value['imgdesc']}}" />
                                            </div>
                                            <div class="info">
                                                <div class="text-limit">
                                                    <h4 class="text-justify">{{$value['title']}}</h4>
                                                </div>
                                                <p class="price-home"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                                                <div class="position-star"> <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset></div><br>
                                                <div class="button-home-more">
                                                    <form action="{{url('/create-workspace/preview-overview')}}" method="GET">
                                                        {{csrf_field()}}
                                                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                                                        <button type="submit" class="btn btn-primary">ver mas</button>
                                                    </form>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
            </div>

        <!-- Seccion  responsive (4rta parte) -->
                
        <div class="container hidden-md hidden-sm hidden-lg">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title-text-box" >Lugar de trabajo</h2>
                </div>
            </div>
        </div>
            <div id="carousel-example-generic4" class="carousel slide  hidden-sm hidden-md hidden-lg" data-ride="carousel" data-interval="0">
                <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @if(isset($workspace) AND !empty($workspace) AND $workspace !='Not Found')
                @foreach($workspace as $keys => $value)
                @if($keys == 0)
                <div class="item active">
                  <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
                  <div class="text-limit2">
                    <h4 class="text-justify">{{$value['title']}}</h4>
                </div>
                <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
                <div class="position-star2"> 
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div><br>
                <div class="button-home-more2">
                   <form action="{{url('/create-workspace/preview-overview')}}" method="GET">
                        {{csrf_field()}}
                        <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                        <button type="submit" class="btn btn-primary">ver mas</button>
                    </form>
                </div>
                <div class="clearfix">
                </div>
            </div>

            @else

            <div class="item">
              <img src="{{asset($value['ruta'])}}" class="img-home-config" alt="{{$value['imgdesc']}}">
              <div class="text-limit2">
                <h4 class="text-justify">{{$value['title']}}</h4>
            </div>
            <p class="price-home2"> {{$value['price']}} {{$value['currency_iso'] }} por {{$value['duration']}}</p>
            <div class="position-star2">    
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
            </div><br>
            <div class="button-home-more2">
                <form action="{{url('/create-workspace/preview-overview')}}" method="GET">
                    {{csrf_field()}}
                    <input hidden value="{{$value['service_id']}}" name="service_id"></input>
                    <button type="submit" class="btn btn-primary">ver mas</button>
                </form>
            </div>
            <div class="clearfix">
            </div>
        </div>
        @endif
        @endforeach
        @endif  
</div>

<!-- Controls -->
<a class="left carousel-control control-home2" href="#carousel-example-generic4" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control control-home2" href="#carousel-example-generic4" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>  

                <!--
                <div class="row container-fluid config-home">
                    <div class="text-center col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="col-lg-4"></div>
                      <div class=" col-lg-4">  
                        <h2 class="title-text-box opacity-home"> Espacio Habitable</h2>
                    </div>
                    <div class="col-lg-4"></div>
                     </div>
                    <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-10 col-md-10">
                            <div class="row ">
                                @if(isset($space) AND !empty($space) AND $space !='Not Found')
                                @foreach($space as $sp)
                                <div class="sections col-xs-12 col-sm-4 col-md-4 col-lg-3 contenedor-home opacity-home">
                                    <img src="{{asset($sp['ruta'])}}" alt="{{$sp['imgdesc']}}" class="img-home-config img-thumbnail">
                                    <div class="caption-home">
                                         <p class="text-limit" align="justify" >{{$sp['title']}}</p>
                                        
                                        <span class="price-home"><b>{{$sp['price']}} {{$sp['currency_iso'] }} por {{$sp['duration']}}</b></span>
                                        <div class="contenedor-home">
                                            <form action="{{url('/create-space/preview-overview')}}" method="GET">
                                                {{csrf_field()}}
                                                <input hidden value="{{$sp['service_id']}}" name="service_id"></input>
                                                <button type="submit" class="btn btn-primary">ver mas</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                <div class="row container-fluid config-home">
                    <div class="text-center col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="col-lg-4"></div>
                      <div class=" col-lg-4">  
                        <h2 class="title-text-box opacity-home">Servicio</h2>
                    </div>
                    <div class="col-lg-4"></div>
                     </div>
                    <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-10 col-md-10">
                            <div class="row ">
                                @if(isset($service) AND !empty($service) AND $service !='Not Found')
                                 @foreach($service as $sv)
                                <div class="sections col-xs-12 col-sm-4 col-md-4 col-lg-3 contenedor-home opacity-home">
                                    <img src="{{asset($sv['ruta'])}}" alt="{{$sv['imgdesc']}}" class="img-home-config img-thumbnail">
                                    <div class="caption-home">
                                         <p class="text-limit" align="justify">{{$sv['title']}}</p>
                                         <span class="price-home"><b>{{$sv['price']}} {{$sv['currency_iso'] }} por {{$sv['duration']}}</b></span>
                                        <div class="contenedor-home">
                                            <form action="{{url('/create-service/preview-overview')}}" method="GET">
                                                {{csrf_field()}}
                                                <input hidden value="{{$sv['service_id']}}" name="service_id"></input>
                                                <button type="submit" class="btn btn-primary">ver mas</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>


                <div class="row container-fluid config-home">
                    <div class="text-center col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="col-lg-4"></div>
                      <div class=" col-lg-4">  
                        <h2 class="title-text-box opacity-home">Aparcamiento</h2>
                    </div>
                    <div class="col-lg-4"></div>
                     </div>
                    <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-10 col-md-10">
                            <div class="row ">
                                @if(isset($parking) AND !empty($parking) AND $parking !='Not Found')
                                 @foreach($parking as $pk)
                                <div class="sections col-xs-12 col-sm-4 col-md-4 col-lg-3 contenedor-home opacity-home">
                                    <img src="{{asset($pk['ruta'])}}" alt="{{$pk['imgdesc']}}" class="img-home-config img-thumbnail">
                                    <div class="caption-home">
                                         <p class="text-limit" align="justify">{{$pk['title']}}</p>
                                         <span class="price-home"><b>{{$pk['price']}} {{$pk['currency_iso'] }} por {{$pk['duration']}}</b></span>
                                        <div class="contenedor-home">
                                            <form action="{{url('/create-parking/preview-overview')}}" method="GET">
                                                {{csrf_field()}}
                                                <input hidden value="{{$pk['service_id']}}" name="service_id"></input>
                                                <button type="submit" class="btn btn-primary">ver mas</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>



                <div class="row container-fluid config-home">
                    <div class="text-center col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="col-lg-4"></div>
                      <div class=" col-lg-4">  
                        <h2 class="title-text-box opacity-home">Lugar de Trabajo</h2>
                    </div>
                    <div class="col-lg-4"></div>
                     </div>
                    <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-10 col-md-10">
                            <div class="row ">
                                @if(isset($workspace) AND !empty($workspace) AND $workspace !='Not Found')
                                 @foreach($workspace as $ws)
                                <div class="sections col-xs-12 col-sm-4 col-md-4 col-lg-3 contenedor-home opacity-home">
                                    <img src="{{asset($ws['ruta'])}}" alt="{{$ws['imgdesc']}}" class="img-home-config img-thumbnail">
                                    <div class="caption-home">
                                         <p class="text-limit" align="justify">{{$ws['title']}}</p>
                                         <span class="price-home"><b>78$ por persona</b></span>
                                        <div class="contenedor-home">
                                            <form action="{{url('/create-workspace/preview-overview')}}" method="GET">
                                                {{csrf_field()}}
                                                <input hidden value="{{$ws['service_id']}}" name="service_id"></input>
                                                <button type="submit" class="btn btn-primary">ver mas</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>


                    <div class="col-lg-1 col-md-1"></div>
                </div>
                <div class="row headerRow">
                    <div class="col-lg-1 col-md-1 col-sm-1 "></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 text-center">
                        <img class="img-responsive text-center center-block imgHom" src="{{url('/assets/img/HoWork.png')}}" alt="">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 "></div>
                </div>
        -->
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
    </div>
    @endsection