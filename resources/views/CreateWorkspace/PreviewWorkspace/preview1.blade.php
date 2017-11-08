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
    
    
    @include('CreateWorkspace.PreviewWorkspace.navbar.preview-navbar',['activo2' => 'preview1'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div class="sections">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center nopadding">
                    <br>
                    <img class="imgHom2" src="{{url('/assets/img/user-logo.svg')}}" alt="">
                    <h4 class="text-center">Username</h4>
                    <br>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding anfitrion-config">
                    <h3>Espacio Habitable</h3>
                    <span>Barcelona, Barcelona, Spain</span>
                    <br>
                    <br>
                    <br>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Private-Room.png')}}" alt="">
                        <br>
                        <span>Private room</span>
                    </div>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>1 Guest</span>

                    </div>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Bedroom.png')}}" alt="">
                        <br>
                        <span>1 Bedroom<span>

                    </div>
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                     <img class="imgHom3" src="{{url('/assets/img/Icon-Bed.png')}}" alt="">
                     <br>
                     <span>1 Bed</span>
                    </div>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">The Place</h3>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <strong>Accomodates: </strong><span>1</span><br>
                    <strong>Bathrooms: </strong><span>1</span><br>
                    <strong>Bedrooms: </strong><span>1</span><br>
                    <strong>Beds: </strong><span>1</span><br>
                    <a href="#">House Rules</a>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <strong>Check-in: </strong><span>Ater 3PM</span><br>
                    <strong>Porperty Type: </strong><span>Apartment</span><br>
                    <strong>Room Type: </strong><span>Private</span><br>
                    <strong>Bathroom Type: </strong><span>Private</span><br><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Amenities</h3>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Pets.png')}}" alt=""> </strong><span>Pets Allowed</span><br>
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Elevator.png')}}" alt=""> </strong><span>Elevator in biulding</span><br>
                    <a href="#">+ More</a>
                    <br>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Family.png')}}" alt=""> </strong><span>Family / kid Fiendly</span><br>
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Wifi.png')}}" alt=""> </strong><span>Wifi</span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Prices</h3>
                    <br>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <br>
                    <strong>Cancellation: </strong><span>flexible</span><br>
                    <br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Description</h3>
                </div>
                <div class="col-sm-8 col-xs-10 text-justify">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est omnis odio nulla corporis, delectus libero animi porro laboriosam numquam nisi vero magnam eligendi minima natus voluptatum tempore eius quaerat sunt. </p>
                    <br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">House Rules</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <span>Check-in is after 3PM</span><br>
                    <br>
                    <a href="#">View Calendar <span class="glyphicon glyphicon-calendar"></span></a>
                    <br>
                    <br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Also you should know</h3>
                </div>
                <div class="col-sm-8 col-xs-10 text-justify">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est omnis odio nulla corporis, delectus libero animi porro laboriosam numquam nisi vero magnam eligendi minima natus voluptatum tempore eius quaerat sunt. </p>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Safety</h3>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <span>Smoke Detector</span><br>
                    <span></span><br>
                    <span>Fire Extinguisher</span><br><br>
                </div>
                <div class="col-sm-4 col-xs-5">
                    <span>Kitchen roof</span><br>
                    <span></span><br>
                    <span>Kitchen right of stove</span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Emergency instructions</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est omnis odio nulla corporis, delectus libero animi porro laboriosam numquam nisi vero magnam eligendi minima natus voluptatum tempore eius quaerat sunt. </p>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-12">
                    <h3 class="font title-category-2">Emergency phone numbers</h3>
                </div>
                <div class="col-sm-8 col-xs-10">
                    <p>
                        <img class="lilicon" src="{{url('assets/img/Icon-Information.png')}} " alt=""> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est omnis odio nulla corporis, delectus libero animi porro laboriosam numquam nisi vero magnam
                        eligendi minima natus voluptatum tempore eius quaerat sunt.
                    </p>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection