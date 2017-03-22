@section('title', 'Basics') @extends('layouts.master') @section('class', 'contenedor') @section( 'content') @include('CreateSpace.navbar.navbar',['activo' => 'location'])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4">
                    <h3 class="titulo text-left">CUENTALE A LOS VIAJEROS SOBRE TU LUGAR</h3>
                    <span class="titulo text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit illum molestiae veritatis</span>
                    <br>
                    <div class="form-group text-left">
                        <h4 class="text-left">Titulo de la publicacion</h4>
                        <input type="text" name="quantity" class="form-control" required>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>Descripcion:</label>
                        </div>
                        <div class="text-left">
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                    </div>
                    <h3 class="titulo text-left">CUENTANOS MÁS</h3>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>Tu Lugar</label>
                        </div>
                        <div class="text-left">
                            <input type="text" name="quantity" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>¿Cómo accederan los huespedes?</label>
                        </div>
                        <div class="text-left">
                            <input type="text" name="quantity" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <div class="text-left">
                            <label>Interaccion con los invitados</label>
                        </div>
                        <div class="text-center">
                            <input type="text" name="quantity" class="form-control">
                        </div>
                    </div>

                    <div class="form-group text-left">
                        <div class="radio">
                            <input id="male" type="radio" name="gender" value="guest">
                            <label for="guest">Planeo compartir con mis invitados</label>
                            <br>
                            <input id="male" type="radio" name="gender" value="noguest">
                            <label for="noguest">Les dare su espacio a mis invitados, pero estare disponible cuando lo necesiten.</label>
                        </div>
                    </div>
                    <div class="text-left">
                        <input type="text" name="quantity" class="form-control">
                    </div>

                    <div class="form-group text-left">
                        <div class="text-left">
                            <br>
                            <label>¿Alguna otra cosa que agregar?</label>
                        </div>
                        <div class="text-center">
                            <input type="text" name="quantity" class="form-control">
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="cheks">
                            <button type="button" class="btn btn-md works2" data-toggle="button">Agregar Idioma</button>
                        </div>
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
                <a href="{{url('/create-space/baths')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-space/amenities')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection