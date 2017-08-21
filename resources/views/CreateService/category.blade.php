@extends('layouts.master') @section('title', 'Category') @section('class', 'contenedor') @section('content') @include('CreateService.navbar.navbar',['activo' => 'category'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <br>
            <form id="formAddCategoryService" method="POST" action="{{url('/create-service/save-category')}}">
            <h3 class="titulo text-center">QUÉ TIPO DE SERVICIO OFRECERAS</h3>
            <spam>Indique las categorias que mejor describan la experiencia.</spam>
            <br>

            <div class="checkbox">
                <label><input type="checkbox" name="recreational"  @if(!empty($recreational) AND $recreational == 1) {{ 'checked' }} @endif>Recreacional</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Familiar</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Deportiva</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Categoria</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Categoria</label>
            </div>
            <div class="form-group text-leftt">
                <h4>¿Cuantos invitados puedes atender por dia?</h4>
                <div class="text-left">
                    <input type="number" name="num_guest" min="1" class="form-control" step="1" placeholder="0" required>
                </div>
                <div class="form-group text-left">
                    <h4>¿Cuantos invitados puedes atender por servicio?</h4>
                    <div class="text-left">
                        <input type="number" name="num_guest_service" min="1" class="form-control" step="1" placeholder="0" required>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <div class="text-left">
                    <h4>Selecciona tu tiempo por defecto</h4>
                </div>
                <div class="container">
                    <div class="text-left">
                        <div class="cheks"><label for="selectin">Desde:   </label></div>
                        <div class="cheks"> <select id="selectin" name="checkin" class="selectpicker form-control  required">
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
                        </select></div>
                    </div>
                    <br>
                    <div class="text-left">
                        <div class="cheks"><label for="selectin">Hasta:   </label></div>
                        <div class="cheks"> <select id="selectin" name="checkout" class="selectpicker form-control required">
                                    <option @if(!empty($selected_departure) AND $selected_departure == '00:00:00') {{ 'selected' }} @endif value="00:00:00">12 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '01:00:00') {{ 'selected' }} @endif value="01:00:00">1 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '02:00:00') {{ 'selected' }} @endif value="02:00:00">2 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '03:00:00') {{ 'selected' }} @endif value="03:00:00">3 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '04:00:00') {{ 'selected' }} @endif value="04:00:00">4 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '05:00:00') {{ 'selected' }} @endif value="05:00:00">5 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '06:00:00') {{ 'selected' }} @endif value="06:00:00">6 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '07:00:00') {{ 'selected' }} @endif value="07:00:00">7 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '08:00:00') {{ 'selected' }} @endif value="08:00:00">8 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '09:00:00') {{ 'selected' }} @endif value="09:00:00">9 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '10:00:00') {{ 'selected' }} @endif value="10:00:00">10 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '11:00:00') {{ 'selected' }} @endif value="11:00:00">11 AM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '12:00:00') {{ 'selected' }} @endif value="12:00:00">12 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '13:00:00') {{ 'selected' }} @endif value="13:00:00">1 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '14:00:00') {{ 'selected' }} @endif value="14:00:00">2 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '15:00:00') {{ 'selected' }} @endif value="15:00:00">3 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '16:00:00') {{ 'selected' }} @endif value="16:00:00">4 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '17:00:00') {{ 'selected' }} @endif value="17:00:00">5 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '18:00:00') {{ 'selected' }} @endif value="18:00:00">6 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '19:00:00') {{ 'selected' }} @endif value="19:00:00">7 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '20:00:00') {{ 'selected' }} @endif value="20:00:00">8 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '21:00:00') {{ 'selected' }} @endif value="21:00:00">9 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '22:00:00') {{ 'selected' }} @endif value="22:00:00">10 PM</option>
                                            <option @if(!empty($selected_departure) AND $selected_departure == '23:00:00') {{ 'selected' }} @endif value="23:00:00">11 PM</option>
                        </select></div>
                    </div>
                </div>
                <br>
                <div class="text-left">
                    <h4>Seleccionae el tiempo de su servicio</h4>
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="number" name="" min="1" class="form-control cheks" step="1" placeholder="0" required>
                        </div>
                        <div class="cheks form-group">
                            <select id="selectin" class="selectpicker form-control required">
                                    <option>Minutos</option>
                                    <option>Horas</option>
                            </select>

                        </div>
            <input type="hidden" value="{{ $id }}" name="service_id">
            {{csrf_field()}}
                    </form>
                </div>
            </div>
            <input type="hidden" value="{{ $id }}" name="service_id">
            {{csrf_field()}}
            </form>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <span><strong>SOME RANDOM TEXT</strong></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>

            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href=""><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="CategoryService"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection