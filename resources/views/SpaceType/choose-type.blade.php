@extends('layouts.master') @section('title', 'Choose what you want to publish') @section('class', 'contenedor') @section( 'content')


<div class="row">
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 text-center">

    </div>
    <div class="col-lg-10 col-md-11 col-sm-10 col-xs-12 text-center">
        <div class="topmargin">
            <h3 class="text-center title">¿Que deseas publicar?</h3>
            <a id="parking" class="" href="">
                <div class="option-box text-center">
                    <img src="{{url('/assets/img/Icon-Espacio.png')}}" class="choose-img2" alt="">
                    <br>
                    <br>
                    <label for="parking" class="textwhite">
                    Aparcamiento
                </label>
                </div>
            </a>

            <a id="workplace" class="" href="">
                <div class="option-box">
                    <img src="{{url('/assets/img/Icon-Servicio.png')}}" class="choose-img2" alt="">
                    <br>
                    <br>
                    <label for="workplace" class="textwhite">
                    Lugar de Trabajo
                </label>
                </div>
            </a>

        </div>
    </div>
    <div class="col-lg-1 col-sm-1 text-center">

    </div>
</div>
@endsection