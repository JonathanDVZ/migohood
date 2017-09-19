@section('title', 'Basics') 
@extends('layouts.master') 
@section('class', 'contenedor') 
@section( 'content') 
@include('CreateParking.navbar.navbar',['activo' => 'basics'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4">
                    <h3 class="titulo text-left">CUENTANOS SOBRE TU APARCAMIENTO</h3>
                    <span class="titulo text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit illum molestiae veritatis</span>
                    <br>
                     <form id="formAddBasics" method="POST" action="{{url('/create-parking/save-seventh')}}">
                    <div class="form-group text-left">
                        <h4 class="text-left">Titulo de la publicacion</h4>
                        <input type="text" name="title" class="form-control" value="@if(!empty($title)) {{ $title }} @endif" required>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>Descripcion:</label>
                        </div>
                        <div class="text-left">
                            <textarea class="form-control" rows="5" name="description" id="comment">@if(!empty($description)) {{ $description }} @endif</textarea>
                        </div>
                    </div>
                    <h3 class="titulo text-left">CUENTANOS MÁS</h3>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>El Espacio</label>
                        </div>
                        <div class="text-left">
                            <textarea class="form-control" rows="4" id="comment" name="crib">@if(!empty($place)) {{ $place }} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>Acceso de Invitados</label>
                        </div>
                        <div class="text-left">
                            <textarea class="form-control" rows="4" id="comment" name="acc">@if(!empty($access)) {{ $access }} @endif</textarea>
                        </div>
                    </div>
                    {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-parking/hosting')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addBasicsNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection