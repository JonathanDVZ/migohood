@extends('layouts.master') @section('title', 'Hosting') @section('class', 'contenedor') @section( 'content') @include('CreateService.navbar.navbar',['activo' => 'hosting'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-3">

                    <h3 class="titulo text-center">Fechas Disponibles</h3>
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div id="datetimepicker3"></div>
                        </div>
                    </div>
                    <div class="text-left">
                        <label class="textwhite">Precio</label>
                        <br>
                        <span class="textwhite">Elige tu propio precio</span>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label class="textwhite">Precio:</label>
                                </div>
                                <div class="text-left">
                                    <input type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label class="textwhite">Por:</label>
                                </div>
                                <div class="text-left">
                                    <select class="selectpicker form-control required">
                                    <option>Elige uno</option>
                                    <option>Distrito Capital</option>
                                    <option>Barinas</option>
                                    <option>Barquisimeto</option>
                                    <option></option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label class="textwhite">Moneda:</label>
                                </div>
                                <div class="text-left">
                                    <select class="selectpicker form-control required">
                                    <option>USD</option>
                                    <option>VEF</option>
                                    <option>COP</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                    </div>
                    <div>
                        <label><strong class="textwhite">Política de Cancelación</strong></label>
                        <br>
                        <span class="textwhite">Elige tu tipo de politica.</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-left">
                                <div class="radio">
                                    <label class="textwhite"><input type="radio" name="optradio"><strong>Flexible</strong></label>
                                    <hr class="green">
                                    <p class="textwhite">lorem ipsum baslkbjalsk valskdjlaskdf asldckaS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-left">
                                <div class="radio">
                                    <label class="textwhite"><input type="radio" name="optradio"><strong>Moderado</strong></label>
                                    <hr class="orange">
                                    <p class="textwhite">lorem ipsum baslkbjalsk valskdjlaskdf asldckaS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-left">
                                <div class="radio">
                                    <label class="textwhite"><input class="textwhite" type="radio" name="optradio"><strong>Estricto</strong></label>
                                    <hr class="red">
                                    <p class="textwhite">lorem ipsum baslkbjalsk valskdjlaskdf asldckaS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="container-fluid">
                            <div class="text-center">
                                <div class="cheks"><label for="selectin">Desde:   </label></div>
                                <div class="cheks">
                                    <select id="selectin" class="selectpicker form-control required">
                                        <option>10 AM</option>
                                        <option>VEF</option>
                                        <option>COP</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="container-fluid">
                            <div class="text-center">
                                <div class="cheks"><label for="selectin">Hasta:   </label></div>
                                <div class="cheks black">
                                    <select class="selectpicker form-control required">
                                        <option>10 AM</option>
                                        <option>VEF</option>
                                        <option>COP</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-center">

                    <span>Cantidad de personas</span>
                    <br>
                    <br>
                    <input type="number" min="0" step="0" class="form-control" placeholder="0" required/>
                </div>
                <div class="text-center">
                    <br>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-service/category')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-service/basics')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection