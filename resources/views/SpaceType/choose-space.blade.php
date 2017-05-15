@extends('layouts.master') @section('title', 'Choose Space') @section('class', 'contenedor') @section( 'content')

<div class="row">
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 text-center">

    </div>
    <div class="col-lg-10 col-md-11 col-sm-10 col-xs-12 text-center">
        <div class="topmargin">
            <h3 class="text-center title">¿Que tipo de espacios deseas publicar?</h3>
            <a id="space" class="" href="{{url('/create-space/place-type')}}">
                <div class="option-box text-center">
                    <img src="{{url('/assets/img/Icon-Espacio-Habitable.png')}}" class="choose-img" alt="">
                    <br>
                    <br>
                    <label for="space" class="textwhite">
                    Espacio Habitable
                </label>
                </div>
            </a>

            <a id="parking" class="" href="{{url('/create-parking/place-type')}}">
                <div class="option-box text-center">
                    <img src="{{url('/assets/img/Icon-Aparcamiento.png')}}" class="choose-img" alt="">
                    <br>
                    <br>
                    <label for="parking" class="textwhite">
                    Aparcamiento
                </label>
                </div>
            </a>

            <a id="service" class="" href="{{url('/create-service/category')}}">
                <div class="option-box text-center">
                    <img src="{{url('/assets/img/Icon-Servicio.png')}}" class="choose-img" alt="">
                    <br>
                    <br>
                    <label for="Service" class="textwhite">
                    Servicio
                </label>
                </div>
            </a>

            <a id="workplace" class="" href="">
                <div class="option-box">
                    <img src="{{url('/assets/img/Icon-Lugar-de-trabajo.png')}}" class="choose-img" alt="">
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