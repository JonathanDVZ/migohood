 @extends('layouts.master') @section('title', 'Hosting') @section('class', 'contenedor') @section( 'content')
<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a href="#">Place type</a></li>
                <li><a href="#">Bedrooms</a></li>
                <li><a href="#">Baths</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="#">Amenities</a></li>
                <li><a class="activo" href="#">Hosting</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                    <div class="titulos">
                        <h3 class="titulo text-center">INDICA TU DIRECCIÓN</h3>
                        <br>
                    </div>
                    <div class="form-group text-right">
                        <select class="selectpicker form-control" required data-live-search="true">
                            <option></option>
                            <option data-tokens="colombia">Colombia</option>
                            <option data-tokens="venezuela">Venezuela</option>
                            <option data-tokens="estados unidos">Estados Unidos</option>
                            <option data-tokens="españa">España</option>
                            <option data-tokens="argentina">Argentina</option>
                            <option data-tokens="brasil">Brasil</option>
                            <option data-tokens="chile">Chile</option>
                            </select>

                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <input type="number" name="quantity" min="1" max="10" class="form-control" step="1" placeholder="1" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <input type="number" name="quantity" min="1" max="10" class="form-control" step="1" placeholder="1" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <input type="number" name="quantity" min="1" max="10" class="form-control" step="1" placeholder="1" required>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>¿Cuantas Habitaciones ofrece?:</label>
                        </div>
                        <select class="selectpicker form-control required">
                                <option>2 Bedrooms</option>
                                <option>3 Bedrooms</option>
                                <option>4 Bedrooms</option>
                        </select>
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
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href=""><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
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