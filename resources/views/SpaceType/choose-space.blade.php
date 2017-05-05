@extends('layouts.master') @section('title', 'Choose Space') @section('class', 'contenedor') @section( 'content')

<h3 class="text-center titulo">¿QUÉ TIPO DE ESPACIOS DESEAS PUBLICAR?</h3>
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">

    </div>
    <div class="col-lg-10 col-md-10' col-sm-10 col-xs-12 text-center">
        <div class="option-box text-center">
            <a id="space" class="" href="">
                <img src="{{url('/assets/img/Icon-Espacio-Habitable.png')}}" class="choose-img" alt="">
                <br>
                <br>
                <label for="space" class="textwhite">
                    Espacio Habitable
                </label>
            </a>
        </div>
        <div class="option-box">
            <a id="parking" class="" href="">
                <img src="{{url('/assets/img/Icon-Aparcamiento.png')}}" class="choose-img" alt="">
                <br>
                <br>
                <label for="parking" class="textwhite">
                    Aparcamiento
                </label>
            </a>
        </div>
        <div class="option-box">
            <a id="workplace" class="" href="">
                <img src="{{url('/assets/img/Icon-Lugar-de-trabajo.png')}}" class="choose-img" alt="">
                <br>
                <br>
                <label for="workplace" class="textwhite">
                    Lugar de Trabajo
                </label>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 text-center">

    </div>
</div>
@endsection