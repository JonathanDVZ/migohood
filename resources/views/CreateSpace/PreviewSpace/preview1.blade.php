@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding-right">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                    <div class="item">
                        <img src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 2" />
                    </div>
                    <div class="item">
                        <img src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 3" />
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
                        <h4 class="textwhite">$14 Por Noche </h4>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <a href="text-right"><i class="fa fa-pencil cheks" aria-hidden="true"></i></a>
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
    @include('CreateSpace.PreviewSpace.navbar.preview-navbar',['activo2' => 'preview1'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div class="sections">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center nopadding">
                    <br>
                    <img class="imgHom2" src="{{url('/assets/img/user-logo.svg')}}" alt="">
                    <h4 class="text-center">Username</h4>
                    <br>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding">
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
                <div class="col-sm-3 col-xs-3">
                    <h3>The Place</h3>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>Accomodates: </strong><span>1</span><br>
                    <strong>Bathrooms: </strong><span>1</span><br>
                    <strong>Bedrooms: </strong><span>1</span><br>
                    <strong>Beds: </strong><span>1</span><br>
                    <a href="#">House Rules</a>
                    <br>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>Check-in: </strong><span>Ater 3PM</span><br>
                    <strong>Porperty Type: </strong><span>Apartment</span><br>
                    <strong>Room Type: </strong><span>Private</span><br>
                    <strong>Bathroom Type: </strong><span>Private</span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>Amenities</h3>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Pets.png')}}" alt=""> </strong><span>Pets Allowed</span><br>
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Elevator.png')}}" alt=""> </strong><span>Elevator in biulding</span><br>
                    <a href="#">Prueba</a>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Family.png')}}" alt=""> </strong><span>Family / kid Fiendly</span><br>
                    <strong><img class="lilicon" src="{{url('/assets/img/Icon-Wifi.png')}}" alt=""> </strong><span>Wifi</span><br>

                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>The Place</h3>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <a href="#">Prueba</a>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>The Place</h3>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <a href="#">Prueba</a>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>The Place</h3>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <a href="#">Prueba</a>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>The Place</h3>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <a href="#">Prueba</a>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>The Place</h3>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <a href="#">Prueba</a>
                    <br>
                    <br>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                    <strong>hola</strong><span></span><br>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 light-border">

        </div>
    </div>
</div>


@endsection