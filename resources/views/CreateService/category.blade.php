@extends('layouts.master') @section('title', 'Category') @section('class', 'contenedor') @section('content') @include('CreateService.navbar.navbar',['activo' => 'category'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <br>
            <h3 class="titulo text-center">QUÉ TIPO DE SERVICIO OFRECERAS</h3>
            <spam>Indique las categorias que mejor describan la experiencia.</spam>
            <br>

            <div class="checkbox">
                <label><input type="checkbox" value="">Recreacional</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Familiar</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Deportiva</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Categoria</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Categoria</label>
            </div>
            <div class="form-group text-leftt">
                <h4>¿Cuantos invitados puedes atender por dia?</h4>
                <div class="text-left">
                    <input type="number" name="" min="1" class="form-control" step="1" placeholder="0" required>
                </div>
                <div class="form-group text-left">
                    <h4>¿Cuantos invitados puedes atender por servicio?</h4>
                    <div class="text-left">
                        <input type="number" name="" min="1" class="form-control" step="1" placeholder="0" required>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <div class="text-left">
                    <h4>Selecciona tu tiempo por defecto</h4>
                </div>
                <div class="container">
                    <div class="text-left">
                        <div class="cheks"><label for="selectin">Desde:   </label></div>
                        <div class="cheks"> <select id="selectin" class="selectpicker form-control required">
                                    <option>10 AM</option>
                                    <option>VEF</option>
                                    <option>COP</option>
                        </select></div>
                    </div>
                    <br>
                    <div class="text-left">
                        <div class="cheks"><label for="selectin">Hasta:   </label></div>
                        <div class="cheks"> <select id="selectin" class="selectpicker form-control required">
                                    <option>10 AM</option>
                                    <option>VEF</option>
                                    <option>COP</option>
                        </select></div>
                    </div>
                </div>
                <br>
                <div class="text-left">
                    <h4>Seleccionae el tiempo de su servicio</h4>
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="number" name="" min="1" class="form-control cheks" step="1" placeholder="0" required>
                        </div>
                        <div class="cheks form-group">
                            <select id="selectin" class="selectpicker form-control required">
                                    <option>Minutos</option>
                                    <option>Horas</option>
                            </select>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <span><strong>SOME RANDOM TEXT</strong></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>

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
                <a href="{{url('/create-service/hosting')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection