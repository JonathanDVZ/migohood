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