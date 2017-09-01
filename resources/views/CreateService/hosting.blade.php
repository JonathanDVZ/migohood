@extends('layouts.master') @section('title', 'Hosting') @section('class', 'contenedor') @section( 'content') @include('CreateService.navbar.navbar',['activo' => 'hosting'])
<div class="container-fluid">
    <form id="formAddHostingService" method="POST" action="{{url('/create-service/save-hosting')}}">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-3">
                    <h3 class="titulo text-center">Fechas Disponibles</h3>
                    <div style="overflow:hidden;">
                        <div class="form-group" style="overflow:hidden;">
                            <div id="datetimepicker3"></div>
                            <div id="calendar" style="overflow:hidden;"></div>
                        </div>
                    </div>
                    <div class="text-left">
                        <label class="textwhite">Precio</label>
                        <br>
                        <span class="textwhite">Elige tu propio precio</span>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label class="textwhite">Precio:</label>
                                </div>
                                <div class="text-left">
                                    <input value="@if(isset($price) AND !empty($price)){{ $price }}@endif" type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" name="price" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label class="textwhite">Por:</label>
                                </div>
                                <div class="text-left">
                                    <select name="duration" class="selectpicker form-control required">
                                    <option value="5">Persona</option>
                                    <option value="6">Tarifa plana</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group text-right">
                                <div class="text-left">
                                    <label class="textwhite">Moneda:</label>
                                </div>
                                <div class="text-left">
                                    <select class="selectpicker form-control required" name="currency">
                                    @foreach($currencies as $curren)
                                        <option @if(!empty($selected_currency) AND $selected_currency == $curren['currency_iso']) {{ 'selected' }} @endif value="{{ $curren['id'] }}">{{ $curren['currency_iso'] }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                    </div>
                    <div>
                        <label><strong class="textwhite">Política de Cancelación</strong></label>
                        <br>
                        <span class="textwhite">Elige tu tipo de politica.</span>
                    </div>
                    <div class="row">
                         @foreach($payments as $pay)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group text-left">
                                    <div class="radio">
                                        <label class="textwhite"><input @if(!empty($selected_payment) AND $selected_payment == $pay['type']) {{ 'checked' }} @endif  type="radio" name="politic_payment" value="{{ $pay['code'] }}"><strong>{{ $pay['type'] }}</strong></label>
                                        @if($pay['code'] == 1)
                                            <hr class="green">
                                        @elseif($pay['code'] == 2)
                                            <hr class="orange">
                                        @else
                                            <hr class="red">
                                        @endif

                                        <p class="textwhite">lorem ipsum baslkbjalsk valskdjlaskdf asldckaS</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
         <input type="hidden" name="service_id" value="{{ $id }}">
                        {{ csrf_field() }}
        
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="container-fluid">
                            <div class="text-center">
                                <div class="cheks"><label for="selectin">Desde:   </label></div>
                                <div class="cheks">
                                    <select class="selectpicker form-control required" name="time_entry">
                                        <option @if(!empty($selected_entry) AND $selected_entry == '00:00:00') {{ 'selected' }} @endif value="00:00:00">12 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '01:00:00') {{ 'selected' }} @endif value="01:00:00">1 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '02:00:00') {{ 'selected' }} @endif value="02:00:00">2 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '03:00:00') {{ 'selected' }} @endif value="03:00:00">3 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '04:00:00') {{ 'selected' }} @endif value="04:00:00">4 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '05:00:00') {{ 'selected' }} @endif value="05:00:00">5 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '06:00:00') {{ 'selected' }} @endif value="06:00:00">6 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '07:00:00') {{ 'selected' }} @endif value="07:00:00">7 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '08:00:00') {{ 'selected' }} @endif value="08:00:00">8 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '09:00:00') {{ 'selected' }} @endif value="09:00:00">9 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '10:00:00') {{ 'selected' }} @endif value="10:00:00">10 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '11:00:00') {{ 'selected' }} @endif value="11:00:00">11 AM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '12:00:00') {{ 'selected' }} @endif value="12:00:00">12 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '13:00:00') {{ 'selected' }} @endif value="13:00:00">1 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '14:00:00') {{ 'selected' }} @endif value="14:00:00">2 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '15:00:00') {{ 'selected' }} @endif value="15:00:00">3 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '16:00:00') {{ 'selected' }} @endif value="16:00:00">4 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '17:00:00') {{ 'selected' }} @endif value="17:00:00">5 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '18:00:00') {{ 'selected' }} @endif value="18:00:00">6 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '19:00:00') {{ 'selected' }} @endif value="19:00:00">7 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '20:00:00') {{ 'selected' }} @endif value="20:00:00">8 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '21:00:00') {{ 'selected' }} @endif value="21:00:00">9 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '22:00:00') {{ 'selected' }} @endif value="22:00:00">10 PM</option>
                                        <option @if(!empty($selected_entry) AND $selected_entry == '23:00:00') {{ 'selected' }} @endif value="23:00:00">11 PM</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="container-fluid">
                            <div class="text-center">
                                <div class="cheks"><label for="selectin">Hasta:   </label></div>
                                <div class="cheks black">
                                    <select class="selectpicker form-control required" name="until">
                                        <option @if(!empty($selected_until) AND $selected_until == '00:00:00') {{ 'selected' }} @endif value="00:00:00">12 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '01:00:00') {{ 'selected' }} @endif value="01:00:00">1 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '02:00:00') {{ 'selected' }} @endif value="02:00:00">2 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '03:00:00') {{ 'selected' }} @endif value="03:00:00">3 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '04:00:00') {{ 'selected' }} @endif value="04:00:00">4 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '05:00:00') {{ 'selected' }} @endif value="05:00:00">5 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '06:00:00') {{ 'selected' }} @endif value="06:00:00">6 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '07:00:00') {{ 'selected' }} @endif value="07:00:00">7 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '08:00:00') {{ 'selected' }} @endif value="08:00:00">8 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '09:00:00') {{ 'selected' }} @endif value="09:00:00">9 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '10:00:00') {{ 'selected' }} @endif value="10:00:00">10 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '11:00:00') {{ 'selected' }} @endif value="11:00:00">11 AM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '12:00:00') {{ 'selected' }} @endif value="12:00:00">12 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '13:00:00') {{ 'selected' }} @endif value="13:00:00">1 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '14:00:00') {{ 'selected' }} @endif value="14:00:00">2 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '15:00:00') {{ 'selected' }} @endif value="15:00:00">3 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '16:00:00') {{ 'selected' }} @endif value="16:00:00">4 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '17:00:00') {{ 'selected' }} @endif value="17:00:00">5 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '18:00:00') {{ 'selected' }} @endif value="18:00:00">6 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '19:00:00') {{ 'selected' }} @endif value="19:00:00">7 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '20:00:00') {{ 'selected' }} @endif value="20:00:00">8 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '21:00:00') {{ 'selected' }} @endif value="21:00:00">9 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '22:00:00') {{ 'selected' }} @endif value="22:00:00">10 PM</option>
                                        <option @if(!empty($selected_until) AND $selected_until == '23:00:00') {{ 'selected' }} @endif value="23:00:00">11 PM</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <hr>
                <div class="text-center">

                    <span>Cantidad de personas</span>
                    <br>
                    <br>
                    <input type="number" min="0" step="0" class="form-control" placeholder="0" required/>
                </div>
                <div class="text-center">
                    <br>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-service/category')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="HostingService"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>

@endsection