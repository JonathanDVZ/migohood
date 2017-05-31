@section('title', 'Notas') @extends('layouts.master') @section('class', 'contenedor') @section( 'content')@include('CreateSpace.navbar.navbar',['activo' => 'notes'])


<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 lg-offset-3 xs-offset-3 md-offset-3 sm-offset-3">
            <form name="noteAdd" id="noteAdd" method="post" action="{{ url('/create-space/save-notes') }}">
                {{ csrf_field() }}
                <br>
                <h3 class="titulo text-center">¿Qué mas deberian saber los Invitados?</h3>
                <br>
                <p>Mencione cualquier cosa que el huesped debera traer consigo o encargarse el mismo, como el transporte.</p>
                <br>
                <textarea  id="message" name="desc_anything" class="form-control note" rows="5" maxlength="200"></textarea>
                <input disabled value="200 caracters remaining" id="counter">
                <span id='remainingC'></span>
                <br>


                <div>
                    <div class="form-group text-left">
                        <h4 class="text-left">Seguridad de la Casa</h4>
                        <p>Si sucede alguna emergencia, ayuda a tus invitados a estar preparado.<a href="#">Aprende mas sobre seguridad</a></p>
                    </div>

                    <div class="form-group text-left boolNote">
                        <h4 class="text-left">Informacion de Seguridad</h4>

                            <div class="checkbox">
                                <label><input name="bool_smoke" type="checkbox" value="">Detector de humo <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i></label>
                            </div>
                            <div class="checkbox">
                                <label><input name="bool_carbon" type="checkbox" value="">Detector de Monoxido de Carbono <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i></label>
                            </div>
                            <div class="checkbox">
                                <label><input name="bool_first" type="checkbox" value="">Kit de Primeros Auxilios</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="bool_safety" type="checkbox" value="">Tarjeta de Seguridad <i class="fa fa-question-circle" data-toggle="tooltip" title="Hooray!" aria-hidden="true"></i></label>
                            </div>
                            <div class="checkbox">
                                <label><input  name="bool_fire" type="checkbox" value="">Extintor</label>
                            </div>

                    </div>
                    <div class="form-group text-left">
                        <h4 class="text-left">Tarjeta de Seguridad</h4>
                        <p>Un recurso manual que se tiene en cuenta para los invitados. Una copia tambien es incluida en el itinerario de los invitados.</p>
                        <h4 class="text-left">¿Dónde estan localizados los accesorios de Seguridad?</h4>
                        <br>
                        <div class="container">
                            <div class="<   form-group row">
                                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <label for="fireExting">Extintor de Fuego</label>
                                </div>
                                <div class="col-offset-2 col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <input class="form-control" name="desc_fire" type="text " id="fireExting ">
                                </div>

                            </div>
                            <div class="form-group row ">
                                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <label for="fireAlarm ">Alarma de Fuego</label>
                                </div>
                                <div class="col-offset-2 col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <input class="form-control " name="desc_alarm" type="text " id="fireAlarm ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <label for="gasValve ">Valvula de Gas</label>
                                </div>
                                <div class="col-offset-2 col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <input class="form-control " name="desc_gas" type="text " id="gasValve ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Emergency">Instrucciones de la Salida de Emergencia</label>
                                <input type="text" name="desc_exit" class="form-control" id="Emergency">
                            </div>
                            
                            <div class="form-group">
                                <label>Numeros de Emergencia</label>
                                <div class="container">
                                    <h2>List Group With Badges</h2>
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Local</th>
                                                    <th>Numero</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(is_array($emergency))
                                                    @foreach($emergency as $emg)
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Bomberos</td>
                                                            <td>098029385029</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <label for="editar">Editar <i class="fa fa-pencil" aria-hidden="true"></i></label>
                                    <button id="editar" type="button" class="btn btn-info btn-sm hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Numeros de emergencia</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="table-responsive">
                                                            @if(is_array($emergency))
                                                                <table class="table table-condensed">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Local</th>
                                                                        <th>Numero</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    @foreach($emergency as $emg)
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>Bomberos</td>
                                                                            <td>098029385029</td>
                                                                            <td>
                                                                                <button id="deleteNum" type="button" class="btn btn-default hidden"></button>
                                                                                <label for="deleteNum"><i class="fa fa-times" aria-hidden="true"></i></i></label>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                    </tbody>
                                                                </table>
                                                            @else

                                                            @endif
                                                        </div>
                                                        <button id="addMore"  id="addnew" type="button" class="btn btn-info btn-sm hidden" data-toggle="modal" data-target="#addNew"> </button>
                                                        <label for="addMore">Agregar Nuevo <i class="fa fa-plus" aria-hidden="true"></i></label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                            <!--fin modal-->


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="addNew" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add With Badges</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <form  id="formAddWithBadges" action="post">
                            <div class="form-group">
                                <lable>Name</lable>
                                <input type="text" id="name" name="name" placeholder="polices" minlength="4" class="form-control name">
                            </div>
                            <div class="form-group">
                                <lable>Phone Number</lable>
                                <input type="number" id="name" name="phoneNumber" placeholder="000-000-0000" minlength="4" class="number form-control">
                            </div>
                            <div class="form-group">
                                <buttom class="btn btn-default saveAdd">Save</buttom>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
                <a href="{{url( '/create-space/baths')}} "><i class="fa fa-chevron-left " aria-hidden="true "> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right ">
            <div class="RetNex ">
                <br>
                <a href="" id="noteNext"><strong>NEXT</strong><i class="fa fa-chevron-right " aria-hidden="true "></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 "></div>
    </div>
</div>
@endsection
@section("script")
    <script>
        var urlEmergicy = "{{url('/create-space/notes/emergency-number')}}";
        $(".note").on("keyup",function () {
            textCounter(this,'counter',200);
        });
        $("#editar").on("click",function () {
            var lista  = {

            };
        });

        $("#noteNext").on("click",function(e){
            e.preventDefault();
            var form = $("#noteAdd");
            form.submit();
        });
    </script>
    <script src="{{url('/assets/js/notes.js')}}"></script>
@endsection

