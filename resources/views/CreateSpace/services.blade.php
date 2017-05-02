@extends('layouts.master') @section('title', 'Services') @section('class', 'contenedor') @section( 'content') @include('CreateSpace.navbar.navbar',['activo' => 'services'])
<div class="container">
    <div class="titulos">
        <h3 class="titulo text-center">AGREGA TUS SERVICIOS</h3>
        <br>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <input class="fileinputs" acce type="file" name="file" id="file1" class="inputfile" accept="image/*" />
                    <label class="Giant text-center" for="file1">+</label>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <textarea class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
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
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <input class="fileinputs" acce type="file" name="file" id="file1" class="inputfile" accept="image/*" />
                    <label class="Giant text-center" for="file1">+</label>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <textarea class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
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
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
                <br>
                <div class="tex-left RetNex">
                    <a href="{{url('/create-space/photos')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                <div class="RetNex">
                    <br>
                    <a href="{{url('/create-space/notes')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
    </div>
</div>
@endsection