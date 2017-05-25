@extends('layouts.master') 
@section('title', 'Bedrooms') 
@section('class', 'contenedor') 
@section( 'content')
@include('CreateParking.navbar.navbar',['activo' => 'bedrooms'])
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
                                    <span class="text-left">Camas {{ ($beds['quantity'] != null AND $beds['quantity'] != '') ? $beds['quantity'] : '0' }}</span>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group text-right">
                            <div class="text-left">
                                {{ csrf_field() }}
                                <input type="hidden" name="service_id" value="{{$service_id}}">
                                <input type="hidden" name="bedroom_id" value="{{$bedroom_id}}">
                                @if(isset($beds['double_bed']) AND $beds['double_bed'] != NULL AND $beds['double_bed'] != '')
                                    <input type="number" name="double_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Dobles" value="{{ $beds['double_bed']}}" required>
                                @else
                                    <input type="number" name="double_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Dobles" required>
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                @if(isset($beds['queen_bed']) AND $beds['queen_bed'] != NULL AND $beds['queen_bed'] != '')
                                    <input type="number" name="queen_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Queen" value="{{ $beds['queen_bed']}}" required>
                                @else
                                    <input type="number" name="queen_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Queen" required>
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                @if(isset($beds['individual_bed']) AND $beds['individual_bed'] != NULL AND $beds['individual_bed'] != '')
                                    <input type="number" name="individual_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Individuales" value="{{ $beds['individual_bed']}}" required>
                                @else
                                    <input type="number" name="individual_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Camas Individuales" required>
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                @if(isset($beds['sofa_bed']) AND $beds['sofa_bed'] != NULL AND $beds['sofa_bed'] != '')
                                    <input type="number" name="sofa_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Sofa Camas" value="{{ $beds['sofa_bed']}}" required>
                                @else
                                    <input type="number" name="sofa_bed" min="0" max="10" class="form-control" step="1" placeholder="0 Sofa Camas" required>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <div class="text-left">
                                <label>¿Agregar Cama Adicional?:</label>
                            </div>
                            <select name="other_bed" class="selectpicker form-control required">
                                    <option value="0"></option>
                                    <option value="0">Cama King</option>
                                    <option value="0">Cama Queen</option>
                                    <option value="0">Otra</option>
                            </select>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>Aqui veras las opciones en detalle para tu cama</p>
                <br>
                <br>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
</div>
@endsection