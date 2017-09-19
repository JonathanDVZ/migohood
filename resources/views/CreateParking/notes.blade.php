@section('title', 'Notas') @extends('layouts.master') @section('class', 'contenedor') @section( 'content')@include('CreateParking.navbar.navbar',['activo' => 'notes'])


<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 lg-offset-3 xs-offset-3 md-offset-3 sm-offset-3">
            <form name="noteAdd" id="noteAdd" method="post" action="{{ url('/create-parking/save-eleven') }}">
                {{ csrf_field() }}
            <br>
            <h3 class="titulo text-center">¿Qué mas deberian saber los Invitados?</h3>
            <br>
            <p>Mencione cualquier cosa que el huesped debera traer consigo o encargarse el mismo, como el transporte.</p>
            <br>
            <textarea onkeyup="textCounter(this,'counter',200)" id="message" class="form-control" rows="5" maxlength="200" name="desc_anything">@if(!empty($anything)) {{ $anything }} @endif</textarea>
            <input disabled value="200 caracters remaining" id="counter">
            <span id='remainingC'></span>
            <br>

             </form>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row ">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 "></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left ">
            <br>
            <div class="tex-left RetNex ">
                <a href="{{url( '/create-parking/services')}} "><i class="fa fa-chevron-left " aria-hidden="true "> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right ">
            <div class="RetNex ">
                <br>
                <a id="noteNext"><strong>NEXT</strong><i class="fa fa-chevron-right " aria-hidden="true "></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 "></div>
    </div>
</div>
@endsection