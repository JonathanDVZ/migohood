@extends('layouts.master') @section('title', 'Hosting') @section('class', 'contenedor') @section( 'content') @include('CreateParking.navbar.navbar',['activo' => 'hosting'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <br>
                    <br>
                    <br>
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div id="datetimepicker3"></div>
                        </div>
                    </div>
                    <h4>Disponibilidad</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 lilpadding">
                            <button type="button" class="btn Giantb">
                            Horario de Oficina 
                            <br>
                            Lunes - Viernes  
                            <br>
                            9 am - 5 pm
                            </button>
                            <br>
                            <br>
                            <button type="button" class="btn Giantb">
                            Horario de Oficina 
                            <br>
                            Lunes - Viernes  
                            <br>
                            9 am - 5 pm
                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 lilpadding">
                            <button type="button" class="btn Giantb">
                            Horario de Oficina 
                            <br>
                            Lunes - Viernes  
                            <br>
                            9 am - 5 pm
                            </button>
                            <br>
                            <br>
                            <button type="button" class="btn Giantb"> 
                            Horario de Oficina 
                            <br>
                            Lunes - Viernes  
                            <br>
                            9 am - 5 pm
                            </button>
                        </div>
                    </div>

                    <div class="text-left">
                        <label>Precio</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="checkbox">
                                <label><input type="checkbox" value="">día</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">7 días</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">mes</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Detector de Monoxido de Carbono</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                            <br>
                            <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                            <br>
                            <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                            <br>
                            <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                        </label>
                            <br>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label class="textwhite">Check-out:</label>
                                </div>
                                <div class="text-left">
                                    <select class="selectpicker form-control required">
                                    <option>10 AM</option>
                                    <option>VEF</option>
                                    <option>COP</option>
                                </select>
                                </div>
                            </div>
                        </div>
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
                <div class="text-center">
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Available</button>
                    </div>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Blocked</button>
                    </div>
                </div>
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <br>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <br>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="text-left">
                                    <span class="textwhite">Price for the night:</span>
                                    <input type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" required/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <br>
                    <span>TIP:20$</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam neque dolore expedita est sed voluptatibus.</p>
                    <button type="button" id="show" class="btn btn-md works" data-toggle="button" onclick="">Add note <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    <br>
                    <div id="Hidden">
                        <br>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>

                    </div>
                </div>
                <div class="text-center">
                    <br>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Cancel</button>
                    </div>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-space/amenities')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-space/basics')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection