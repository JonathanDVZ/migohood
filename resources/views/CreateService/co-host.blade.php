@extends('layouts.master') @section('title', 'Co-Host') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <h2 class="titulo text-left">Co-Host</h2>
                    <h3 class="titulo text-left">Hostear es mucho más facil con ayuda</h3>
                    <span class="titulo text-center">Tu co-host  puede ayudarte con tu listado, para que asi puedas disgrutar con un poco mas de ayuda ofreciendo tu espacio.</span>
                    <br>
                    <br>
                    <button id="inviteF" type="button" class="btn btn-default hidden"></button>
                    <label class="textwhite" for="inviteF">Invitar Amigo <i class="fa fa-plus" aria-hidden="true"></i></label>
                    <hr>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <div class="text-left cheks">
                                <img src="{{url('/assets/img/User.png')}}" alt="">
                            </div>
                            <div class="text-left cheks">
                                <h3 class="titulo">Username</h3>
                                <span>Administrador</span>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-group text-right" style="cursor: pointer;" onclick="theFunction()">
                        <div class="text-left">
                            <div class="text-left cheks">
                                <img src="{{url('/assets/img/User.png')}}" alt="">
                            </div>
                            <div class="text-left cheks">
                                <h3 class="titulo">Other username</h3>
                                <span>Tu co-host desde <strong>Feb 5, 2017</strong></span>
                            </div>
                            <div class="text-right">
                                <label class="xlabel"><i class="fa fa-times" aria-hidden="true"></i></i></label>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>Tu direccion exacta solo sera mostrada a personas que tengan una reservacion confirmada</p>
                <br>
            </div>
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
                <a href="{{url('/create-space/hosting')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-space/listing')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection