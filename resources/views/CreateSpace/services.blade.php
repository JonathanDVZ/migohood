@extends('layouts.master') @section('title', 'Services') @section('class', 'contenedor') @section( 'content') @include('CreateSpace.navbar.navbar',['activo' => 'services'])
<div class="container">
    <div class="titulos">
        <h3 class="titulo text-center">AGREGA TUS SERVICIOS</h3>
        <br>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <input class="fileinputs file1" acce type="file" data-idFile="1" name="file" id="file1" class="inputfile" accept="image/*" />
                    <label class="Giant text-center" for="file1"><span class="add">+</span> <output id="list1"></output></label>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <textarea class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label class="textwhite">Precio:</label>
                        </div>
                        <div class="text-left">
                            <input type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" required/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group text-right">
                        <div class="text-left">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <input class="fileinputs file2" acce type="file" data-idFile="2" name="file" id="file2" class="inputfile" accept="image/*" />
                    <label class="Giant text-center" for="file2"><span class="add">+</span> <output id="list2"></output></label>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <textarea class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group text-right">
                        <div class="text-left">
                            <label class="textwhite">Precio:</label>
                        </div>
                        <div class="text-left">
                            <input type="number" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$" required/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group text-right">
                        <div class="text-left">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alingRight" >
            <button  class="btn btnbar2 save-continue">Guardar y Continuar</button>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
                <br>
                <div class="tex-left RetNex">
                    <a href="{{url('/create-space/photos')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                <div class="RetNex">
                    <br>
                    <a href="{{url('/create-space/notes')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
    </div>
</div>
@endsection

@section("script")
    <script>
        function archivo(evt,vm) {
            var files = evt.target.files; // FileList object
            var parent = vm.parentNode;
            var id = $(vm).data("idfile");
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                reader.onload = (function(theFile) {
                    return function(e) {
                        var a = $(parent).find('#list'+id);
                        var img = ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                        a.append(img);
                        a = $(a).find('img.thumb');
                        a.css("width","100%");
                        a.css("height","11.5em");
                        a.css("margin","0px");
                    };
                })(f);

                reader.readAsDataURL(f);
            }
        }
        var h;
        $(".save-continue").attr("disabled",true);
        var ActionEvent = function(vm){
            var  i =vm.parentNode;
            $(i).find("label.Giant").css("padding","0px");
            $(i).find("label.Giant output").css("padding","0px");
            i = $(i).find(".add").remove();
        };
        $(".file1").on("change",function(e){

            ActionEvent(this);
            archivo(e,this);
            if($(this).val()!=""){
                    $(".save-continue").attr("disabled",false);
            }

        });
        $(".file2").on("change",function(e){

            ActionEvent(this);
            archivo(e,this);
            if($(this).val()!=""){
                $(".save-continue").attr("disabled",false);
            }
        });

        $(".save-continue").on("click",function(){

        });

    </script>
@endsection