@extends('layouts.master') @section('title', 'Hosting') @section('class', 'contenedor') @section( 'content') @include('CreateSpace.navbar.navbar',['activo' => 'hosting'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
<<<<<<< HEAD
                <from method="POST" action="{{ url('/create-space/add-bedrooms') }}" >
                    <div class="col-sm-8 col-sm-offset-3">
                        <br>
                        <br>
                        <br>
                        <div style="overflow:hidden;">
                            <div class="form-group">
                                <div id="datetimepicker3"></div>
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
                                        <input type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" required/>
=======
                <div class="col-sm-8 col-sm-offset-3">
                    <br>
                    <br>
                    <br>
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div id="datetimepicker3"></div>
                        </div>
                    </div>
                    <form id="formAddHosting" method="POST" action="{{url('/create-space/save-hosting')}}">
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
                                        <input type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" name="price" required/>
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
                                            @foreach($durations as $durat)
                                                <option value="{{ $durat['code'] }}">{{ $durat['type'] }}</option>
                                            @endforeach
                                    </select>
>>>>>>> 92a314db2fce33597c4a99fe9c4800f2697e4651
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group text-right">
                                    <div class="text-left">
<<<<<<< HEAD
                                        <label class="textwhite">Por:</label>
                                    </div>
                                    <div class="text-left">
                                        <select class="selectpicker form-control required">
                                        <option>Elige uno</option>
                                        <option>Distrito Capital</option>
                                        <option>Barinas</option>
                                        <option>Barquisimeto</option>
                                        <option></option>
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
                                        <select class="selectpicker form-control required">
                                        <option>USD</option>
                                        <option>VEF</option>
                                        <option>COP</option>
                                    </select>
=======
                                        <label class="textwhite">Moneda:</label>
                                    </div>
                                    <div class="text-left">
                                        <select class="selectpicker form-control required" name="currency">
                                            @foreach($currencies as $curren)
                                                <option value="{{ $curren['id'] }}">{{ $curren['currency_iso'] }}</option>
                                            @endforeach
                                        </select>
>>>>>>> 92a314db2fce33597c4a99fe9c4800f2697e4651
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label><strong class="textwhite">Check-in</strong></label>
                            <br>
                            <span class="textwhite">¿Qué hora funciona para usted?</span>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group text-right">
                                    <div class="text-left">
                                        <label class="textwhite">Check-in:</label>
                                    </div>
                                    <div class="text-left">
<<<<<<< HEAD
                                        <select class="selectpicker form-control required">
                                        <option>10 AM</option>
                                        <option>VEF</option>
                                        <option>COP</option>
                                    </select>
=======
                                        <select class="selectpicker form-control required" name="time_entry">
                                            <option value="00:00:00">12 AM</option>
                                            <option value="01:00:00">1 AM</option>
                                            <option value="02:00:00">2 AM</option>
                                            <option value="03:00:00">3 AM</option>
                                            <option value="04:00:00">4 AM</option>
                                            <option value="05:00:00">5 AM</option>
                                            <option value="06:00:00">6 AM</option>
                                            <option value="07:00:00">7 AM</option>
                                            <option value="08:00:00">8 AM</option>
                                            <option value="09:00:00">9 AM</option>
                                            <option value="10:00:00">10 AM</option>
                                            <option value="11:00:00">11 AM</option>
                                            <option value="12:00:00">12 PM</option>
                                            <option value="13:00:00">1 PM</option>
                                            <option value="14:00:00">2 PM</option>
                                            <option value="15:00:00">3 PM</option>
                                            <option value="16:00:00">4 PM</option>
                                            <option value="17:00:00">5 PM</option>
                                            <option value="18:00:00">6 PM</option>
                                            <option value="19:00:00">7 PM</option>
                                            <option value="20:00:00">8 PM</option>
                                            <option value="21:00:00">9 PM</option>
                                            <option value="22:00:00">10 PM</option>
                                            <option value="23:00:00">11 PM</option>
                                        </select>
>>>>>>> 92a314db2fce33597c4a99fe9c4800f2697e4651
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group text-right">
                                    <div class="text-left">
                                        <label class="textwhite">To:</label>
                                    </div>
                                    <div class="text-left">
<<<<<<< HEAD
                                        <select class="selectpicker form-control required">
                                        <option>2 AM (Next Day)</option>
                                        <option>VEF</option>
                                        <option>COP</option>
=======
                                        <select class="selectpicker form-control required" name="until">
                                            <option value="00:00:00">12 AM</option>
                                            <option value="01:00:00">1 AM</option>
                                            <option value="02:00:00">2 AM</option>
                                            <option value="03:00:00">3 AM</option>
                                            <option value="04:00:00">4 AM</option>
                                            <option value="05:00:00">5 AM</option>
                                            <option value="06:00:00">6 AM</option>
                                            <option value="07:00:00">7 AM</option>
                                            <option value="08:00:00">8 AM</option>
                                            <option value="09:00:00">9 AM</option>
                                            <option value="10:00:00">10 AM</option>
                                            <option value="11:00:00">11 AM</option>
                                            <option value="12:00:00">12 PM</option>
                                            <option value="13:00:00">1 PM</option>
                                            <option value="14:00:00">2 PM</option>
                                            <option value="15:00:00">3 PM</option>
                                            <option value="16:00:00">4 PM</option>
                                            <option value="17:00:00">5 PM</option>
                                            <option value="18:00:00">6 PM</option>
                                            <option value="19:00:00">7 PM</option>
                                            <option value="20:00:00">8 PM</option>
                                            <option value="21:00:00">9 PM</option>
                                            <option value="22:00:00">10 PM</option>
                                            <option value="23:00:00">11 PM</option>
>>>>>>> 92a314db2fce33597c4a99fe9c4800f2697e4651
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group text-right">
                                    <div class="text-left">
                                        <label class="textwhite">Check-out:</label>
                                    </div>
                                    <div class="text-left">
<<<<<<< HEAD
                                        <select class="selectpicker form-control required">
                                        <option>10 AM</option>
                                        <option>VEF</option>
                                        <option>COP</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                        </div>
                        <div>
                            <label><strong class="textwhite">Política de Cancelación</strong></label>
                            <br>
                            <span class="textwhite">Elige tu tipo de politica.</span>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group text-left">
                                    <div class="radio">
                                        <label class="textwhite"><input type="radio" name="optradio"><strong>Flexible</strong></label>
                                        <hr class="green">
                                        <p class="textwhite">lorem ipsum baslkbjalsk valskdjlaskdf asldckaS</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group text-left">
                                    <div class="radio">
                                        <label class="textwhite"><input type="radio" name="optradio"><strong>Moderado</strong></label>
                                        <hr class="orange">
                                        <p class="textwhite">lorem ipsum baslkbjalsk valskdjlaskdf asldckaS</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group text-left">
                                    <div class="radio">
                                        <label class="textwhite"><input class="textwhite" type="radio" name="optradio"><strong>Estricto</strong></label>
                                        <hr class="red">
=======
                                        <select class="selectpicker form-control required" name="departure_time">
                                            <option value="00:00:00">12 AM</option>
                                            <option value="01:00:00">1 AM</option>
                                            <option value="02:00:00">2 AM</option>
                                            <option value="03:00:00">3 AM</option>
                                            <option value="04:00:00">4 AM</option>
                                            <option value="05:00:00">5 AM</option>
                                            <option value="06:00:00">6 AM</option>
                                            <option value="07:00:00">7 AM</option>
                                            <option value="08:00:00">8 AM</option>
                                            <option value="09:00:00">9 AM</option>
                                            <option value="10:00:00">10 AM</option>
                                            <option value="11:00:00">11 AM</option>
                                            <option value="12:00:00">12 PM</option>
                                            <option value="13:00:00">1 PM</option>
                                            <option value="14:00:00">2 PM</option>
                                            <option value="15:00:00">3 PM</option>
                                            <option value="16:00:00">4 PM</option>
                                            <option value="17:00:00">5 PM</option>
                                            <option value="18:00:00">6 PM</option>
                                            <option value="19:00:00">7 PM</option>
                                            <option value="20:00:00">8 PM</option>
                                            <option value="21:00:00">9 PM</option>
                                            <option value="22:00:00">10 PM</option>
                                            <option value="23:00:00">11 PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                        <label class="textwhite"><input type="radio" name="politic_payment" value="{{ $pay['code'] }}"><strong>{{ $pay['type'] }}</strong></label>
                                        @if($pay['code'] == 1)
                                            <hr class="green">
                                        @elseif($pay['code'] == 2)
                                            <hr class="orange">
                                        @else
                                            <hr class="red">
                                        @endif
                                        
>>>>>>> 92a314db2fce33597c4a99fe9c4800f2697e4651
                                        <p class="textwhite">lorem ipsum baslkbjalsk valskdjlaskdf asldckaS</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
<<<<<<< HEAD
                    </div>
                </from>
=======
                        <input type="hidden" name="service_id" value="{{ $id }}">
                        {{ csrf_field() }}
                    </form>
                </div>
>>>>>>> 92a314db2fce33597c4a99fe9c4800f2697e4651
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <!--<div class="text-center">
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Available</button>
                    </div>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Blocked</button>
                    </div>
                </div>
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <br>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <br>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="text-left">
                                    <span class="textwhite">Price for the night:</span>
                                    <input type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" required/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <br>
                    <span>TIP:20$</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam neque dolore expedita est sed voluptatibus.</p>
                    <button type="button" id="show" class="btn btn-md works" data-toggle="button" onclick="">Add note <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    <br>
                    <div id="Hidden">
                        <br>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>

                    </div>
                </div>
                <div class="text-center">
                    <br>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Cancel</button>
                    </div>
                    <div class="cheks">
                        <button type="button" class="btn btn-md works2" data-toggle="button">Save</button>
                    </div>
                </div>-->
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nihil fuga atque dolores, eaque, velit iste nostrum, odio repellendus quas similique maxime suscipit facere, accusamus et reiciendis vero expedita quidem.
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{ url('/create-space/amenities') }}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addHostingNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection