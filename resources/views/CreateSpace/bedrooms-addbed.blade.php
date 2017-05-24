@extends('layouts.master')
@section("stylesheet")
    <link rel="stylesheet" href="{{url('/assets/css/app.css')}}">
@endsection
@section('title', 'Bedrooms') 
@section('class', 'contenedor') 
@section( 'content')
@include('CreateSpace.navbar.navbar',['activo' => 'bedrooms'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <br>
                    <form action="{{ url('/create-space/bedrooms/edit-bedrooms/save-beds') }}" method="POST">
                        <div class="text-right">
                            <h3 class="titulo text-center">DETALLES DE LA ESTADIA</h3>
                            <div class='beds-detail'>
                                <div>
                                    <button type="submit" class="btn btn-sm continue2">Listo</button>
                                </div>
                                <div>
                                    <span class="text-left">Habitacion {{ $refer+1 }}</span>
                                    <br>
                                    <span class="text-left">Camas {{ (isset($beds['quantity']) AND $beds['quantity'] != null AND $beds['quantity'] != '') ? $beds['quantity'] : '0' }}</span>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group text-right">
                            <div class="text-left">
                                {{ csrf_field() }}
                                <input type="hidden" name="service_id" value="{{$id}}">
                                <input type="hidden" name="bedroom_id" value="{{$bedroom_id}}">
                                @if(isset($beds['double_bed']) AND $beds['double_bed'] != NULL AND $beds['double_bed'] != '')
                                    <input type="number" data-type="cama-doble" name="double_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Dobles" value="{{ $beds['double_bed']}}">
                                @else
                                    <input type="number" data-type="cama-doble" name="double_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Dobles">
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                @if(isset($beds['queen_bed']) AND $beds['queen_bed'] != NULL AND $beds['queen_bed'] != '')
                                    <input type="number" data-type="cama-queen" name="queen_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Queen" value="{{ $beds['queen_bed']}}">
                                @else
                                    <input type="number" data-type="cama-queen" name="queen_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Queen">
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                @if(isset($beds['individual_bed']) AND $beds['individual_bed'] != NULL AND $beds['individual_bed'] != '')
                                    <input type="number" data-type="cama-individual" name="individual_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Individuales" value="{{ $beds['individual_bed']}}">
                                @else
                                    <input type="number" data-type="cama-individual" name="individual_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Individuales">
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                @if(isset($beds['sofa_bed']) AND $beds['sofa_bed'] != NULL AND $beds['sofa_bed'] != '')
                                    <input type="number" data-type="sofa-cama" name="sofa_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Sofa Camas" value="{{ $beds['sofa_bed']}}">
                                @else
                                    <input type="number" data-type="sofa-cama" name="sofa_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Sofa Camas">
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <div class="text-left">
                                <label>¿Agregar Cama Adicional?:</label>
                            </div>
                          {{--  <select name="other_bed" class="selectpicker form-control">
                                    <option value="0"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                            </select>--}}
                            <select name="other_bed" id="selectbed" class="selectpicker form-control required">
                                <option value=""> Adicionar otra cama </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <div class="contentSelect"></div>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox col-md-12 col-lg-12  col-sm-12 col-xs-12">
                <p>Aqui veras las opciones en detalle para tu cama</p>
                <br>
                <br>
                <div class="contentImg "></div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
</div>
@endsection

@section("script")
    <script>
        var url = "{{URL::asset('/assets/img/iconos-bed/')}}";
        url +"/";
        console.log(url);
        $(document).ready(function(){

            $("input[name=sofa_bed]").on("keyup",function(){adicionImg(this,true) });
            $("input[name=double_bed]").on("keyup",function(){adicionImg(this,true) });
            $("input[name=queen_bed]").on("keyup",function(){adicionImg(this,true) });
            $("input[name=individual_bed]").on("keyup",function(){adicionImg(this,true) });
        });
    </script>
@endsection