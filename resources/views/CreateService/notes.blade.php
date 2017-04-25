@section('title', 'Notas') @extends('layouts.master') @section('class', 'contenedor') @section( 'content')@include('CreateService.navbar.navbar',['activo' => 'notes'])


<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 lg-offset-3 xs-offset-3 md-offset-3 sm-offset-3">

            <br>
            <h3 class="titulo text-center">¿Qué mas deberian saber los Invitados?</h3>
            <br>
            <p>Mencione cualquier cosa que el huesped debera traer consigo o encargarse el mismo, como el transporte.</p>
            <br>
            <textarea onkeyup="textCounter(this,'counter',200)" id="message" class="form-control" rows="5" maxlength="200"></textarea>
            <input disabled value="200 caracters remaining" id="counter">
            <span id='remainingC'></span>
            <br>

            <div>
                <div class="form-group text-left">
                    <h4 class="text-left">¿Tienes algun requerimiento para tus inivitados?</h4>
                </div>
                <div class="form-group text-left">
                    <form>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Mi Experiencia incluye alcohol, los invitados deben tener edad legal para beber</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Necesitan certificacion especial</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="quantity" class="form-control" placeholder="123456">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Requerimientos adicionales</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="quantity" class="form-control" placeholder="123456">
                        </div>
                        <h4 class="text-left">¿No tienes requerimientos?</h4>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Cualquiera puede disfrutar de mi experiencia</label>
                        </div>
                        <h4 class="text-left">¿Ofreces algo para tus invitados?</h4>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Comida</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="quantity" class="form-control" placeholder="Arroz con pollo">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Bocadillos</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="quantity" class="form-control" placeholder="Empanaditas">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Bebidas</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="quantity" class="form-control" placeholder="Bebida Achocolatada">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Transporte</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="quantity" class="form-control" placeholder="123456">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Alojamiento</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="quantity" class="form-control" placeholder="123456">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Otro</label>
                        </div>
                        <div class="text-right">
                            <textarea class="form-control" rows="5" maxlength="200" placeholder="Porfavor indique que esta ofreciendo"></textarea>
                        </div>
                        <h4 class="text-left">¿No tienes requerimientos?</h4>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">No estoy ofreciendo nada</label>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="container ">
    <div class="row ">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 "></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left ">
            <br>
            <div class="tex-left RetNex ">
                <a href="{{url( '/create-service/location')}} "><i class="fa fa-chevron-left " aria-hidden="true "> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right ">
            <div class="RetNex ">
                <br>
                <a href="{{url( '/create-service/co-host')}} "><strong>NEXT</strong><i class="fa fa-chevron-right " aria-hidden="true "></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 "></div>
    </div>
</div>
@endsection