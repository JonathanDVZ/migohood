 @extends('layouts.master') @section('title', 'Bedrooms') @section('class', 'contenedor') @section( 'content')
<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a href="#">Place type</a></li>
                <li><a class="activo" href="#">Bedrooms</a></li>
                <li><a href="#">Baths</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="#">Amenities</a></li>
                <li><a href="#">Hosting</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <br>
            <h3 class="titulo text-center">DETALLES DE LA ESTADIA</h3>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                    <div>
                        <div class="titulos">
                            <span>Habitacion 1</span>
                            <br>
                            <span>0 Camas</span>
                        </div>
                        <div class="titulos">

                            <a href="{{url('/space-create/bedrooms/edit-bedroom/add-bed')}}" class="btn btn-sm continue" role="button">Agregar Camas</a>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="titulos">
                            <span>Habitacion 1</span>
                            <br>
                            <span>0 Camas</span>
                        </div>
                        <div class="titulos text-right">

                            <a href="{{url('/space-create/bedrooms/edit-bedroom/add-bed')}}" class="btn btn-sm continue" role="button">Agregar Camas</a>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="titulos">
                            <span>Habitacion 1</span>
                            <br>
                            <span>0 Camas</span>
                        </div>
                        <div class="titulos">

                            <a href="{{url('/space-create/bedrooms/edit-bedroom/add-bed')}}" class="btn btn-sm continue" role="button">Agregar Camas</a>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>El numero y el tipo de camas disponibles, determinaran el numero de huespedes que pueden quedarse comodamente en tu espacio</p>
                <br>

                <p>El detalle de las camas ayuda a entender como esta organizado tu espacio.</p>
                <br>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/space-create/bedrooms')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href=""><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>