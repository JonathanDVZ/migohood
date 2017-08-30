@section('title', 'Notas') @extends('layouts.master') @section('class', 'contenedor') @section( 'content')@include('CreateService.navbar.navbar',['activo' => 'notes'])


<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 lg-offset-3 xs-offset-3 md-offset-3 sm-offset-3">
            <form name="noteAddSErvice" id="noteAddService" method="post" action="{{ url('/create-service/save-notes') }}">
                {{ csrf_field() }}
            <br>
            <h3 class="titulo text-center">¿Qué mas deberian saber los Invitados?</h3>
            <br>
            <p>Mencione cualquier cosa que el huesped debera traer consigo o encargarse el mismo, como el transporte.</p>
            <br>
            <textarea onkeyup="textCounter(this,'counter',200)" name="desc_anything" id="message" class="form-control" rows="5" maxlength="200">@if(!empty($anything)) {{ $anything }} @endif</textarea>
            <input disabled value="200 caracters remaining" id="counter">
            <span id='remainingC'></span>
            <br>

            <div>
                <div class="form-group text-left">
                    <h4 class="text-left">¿Tienes algun requerimiento para tus inivitados?</h4>
                </div>
                <div class="form-group text-left">
                        <div class="checkbox">
                            <label><input @if(!empty($alcohol) AND $alcohol == 1) checked @endif name="bool_alcohol" type="checkbox" value="">Mi Experiencia incluye alcohol, los invitados deben tener edad legal para beber</label>
                        </div>
                        <div class="checkbox">
                            <label><input @if(!empty($certification) AND $certification == 1) checked @endif name="bool_certification" type="checkbox" value="">Necesitan certificacion especial</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="desc_requiments" value="@if(!empty($requiments)) {{ $requiments }} @endif" class="form-control" placeholder="123456">
                        </div>
                        <div class="checkbox">
                            <label><input @if(!empty($aditional) AND $aditional == 1) checked @endif name="bool_aditional" type="checkbox" value="">Requerimientos adicionales</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="desc_aditional" value="@if(!empty($aditional2)) {{ $aditional2 }} @endif" class="form-control" placeholder="123456">
                        </div>
                        <h4 class="text-left">¿No tienes requerimientos?</h4>
                        <div class="checkbox">
                            <label><input name="bool_norequiments" value="@if(!empty($norequiments)) {{ $norequiments }} @endif" type="checkbox" value="">Cualquiera puede disfrutar de mi experiencia</label>
                        </div>
                        <h4 class="text-left">¿Ofreces algo para tus invitados?</h4>
                        <div class="checkbox">
                            <label><input name="bool_food" value="@if(!empty($food)) {{ $food }} @endif" type="checkbox" value="">Comida</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="desc_food" value="@if(!empty($food2)) {{ $food2 }} @endif" class="form-control" placeholder="Arroz con pollo">
                        </div>
                        <div class="checkbox">
                            <label><input @if(!empty($snacks) AND $snacks == 1) checked @endif name="bool_snacks" type="checkbox" value="">Bocadillos</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="desc_snacks" value="@if(!empty($snacks2)) {{ $snacks2 }} @endif" class="form-control" placeholder="Empanaditas">
                        </div>
                        <div class="checkbox">
                            <label><input @if(!empty($drinks) AND $drinks == 1) checked @endif name="bool_drinks" type="checkbox" value="">Bebidas</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="desc_drinks" value="@if(!empty($drinks2)) {{ $drinks2 }} @endif" class="form-control" placeholder="Bebida Achocolatada">
                        </div>
                        <div class="checkbox">
                            <label><input @if(!empty($transport) AND $transport == 1) checked @endif name="bool_transport" type="checkbox" value="">Transporte</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="desc_transport" value="@if(!empty($transport2)) {{ $transport2 }} @endif" class="form-control" placeholder="123456">
                        </div>
                        <div class="checkbox">
                            <label><input @if(!empty($accommodation) AND $accommodation == 1) checked @endif name="bool_accommodation" type="checkbox" value="">Alojamiento</label>
                        </div>
                        <div class="text-right">
                            <input type="text" name="desc_accommodation" value="@if(!empty($accommodation2)) {{ $accommodation2 }} @endif" class="form-control" placeholder="123456">
                        </div>
                        <div class="checkbox">
                            <label><input @if(!empty($other) AND $other == 1) checked @endif name="bool_other" type="checkbox" value="">Otro</label>
                        </div>
                        <div class="text-right">
                            <textarea name="desc_other" class="form-control" rows="5" maxlength="200" placeholder="Porfavor indique que esta ofreciendo">@if(!empty($other)) {{ $other }} @endif</textarea>
                        </div>
                        <h4 class="text-left">¿No tienes requerimientos?</h4>
                        <div class="checkbox">
                            <label><input @if(!empty($nooffers) AND $nooffers == 1) checked @endif name="bool_nooffers" type="checkbox" value="">No estoy ofreciendo nada</label>
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
                <a id="AddNoteService"><strong>NEXT</strong><i class="fa fa-chevron-right " aria-hidden="true "></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 "></div>
    </div>
</div>
@endsection