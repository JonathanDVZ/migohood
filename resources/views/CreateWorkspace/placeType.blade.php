@extends('layouts.master') @section('title', 'Place Type') @section('class', 'contenedor') @section('content') @include('CreateWorkspace.navbar.navbar',['activo' => 'placetype'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                 <form id="formPlaceType" method="POST" action="{{ url('/create-workspace/save-first') }}">
                    <input type="hidden" name="service_id" value="{{ $id }}">
                     {{ csrf_field() }}
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <div class="text-left">
                            </div>
                            <h4>¿Qué tipo de espacio de trabajo esta ofreciendo?</h4>
                            <br>
                            <select class="selectpicker form-control required" name="type">
                                    @foreach($types as $type)
                                    
                                    <option @if(isset($result['Type']) AND !empty($result['Type']) AND $result['Type'] == $type['name']) {{'selected'}} @endif value="{{ $type['code'] }}">{{ $type['name'] }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                                <label>¿Qué espacio tendrán tus huéspedes?</label>
                            <select class="selectpicker form-control required">
                                    <option>Todo el espacio</option>
                                    <option>espacio</option>
                                    <option>espacio</option>
                            </select>
                            <br>
                            <br>
                            <div id="lilbox">
                                <div class="radio">
                                    <label class="textwhite"><input  @if(isset($result['live']) AND $result['live'] == 0) {{'checked'}} @endif data-type="Exterior" onclick="dataType(this)" type="radio" name="live" value="0" ><strong>Privado</strong></label>
                                </div>
                                <hr>
                                <div class="radio">
                                    <label class="textwhite"><input  @if(isset($result['live']) AND $result['live'] == 1) {{'checked'}} @endif data-type="Interior" onclick="dataType(this)" type="radio" name="live" value="1" ><strong>Compartido</strong></label>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 lilpadding">
                            <button type="button" class="btn Giantb" name="num_space" @if(isset($result['num_space']) AND $result['num_space'] == 1 AND !empty($result['num_space'])) selected @endif value="1">
                            Solo
                            <br>
                            1 persona
                            <br>
                            </button>
                            <br>
                            <br>
                            <button type="button" class="btn Giantb" name="num_space" @if(isset($result['num_space']) AND $result['num_space'] == 6 AND !empty($result['num_space'])) selected @endif value="6">
                            Grupo Pequeño
                            <br>
                            Hasta 6 Personas
                            <br>

                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 lilpadding">
                            <button type="button" class="btn Giantb" @if(isset($result['num_space']) AND $result['num_space'] == 6 AND !empty($result['num_space'])) selected @endif value="12">
                            Grupo Grande
                            <br>
                            Hasta 12 personas
                            <br>
                            </button>
                            <br>
                            <br>
                            <button type="button" class="btn Giantb" @if(isset($result['num_space']) AND $result['num_space'] == 6 AND !empty($result['num_space'])) selected @endif value="0">
                            Evento
                            <br>
                            Mas de 12 personas
                            <br>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/becomeahost')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="placeTypeNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection