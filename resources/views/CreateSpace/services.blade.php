@extends('layouts.master') @section('title', 'Services') @section('class', 'contenedor') @section( 'content') @include('CreateSpace.navbar.navbar',['activo' => 'services'])
<div class="container">
    <div class="titulos">
        <h3 class="titulo text-center">AGREGA TUS SERVICIOS</h3>
        <br>
    </div>
    <form id="formAddServices" method="POST" action="{{url('/create-space/save-services')}}" enctype="multipart/form-data" encoding='multipart/form-data'>
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <input class="fileinputs thumb file1" data-idFile="1" type="file" id="files1" name="file1"/>
                            <label class="Giant text-center" for="files1" @if(!empty($photo1)) style="padding: 0px;" @endif>@if(empty($photo1))<span class="add">+</span> @else <input type="hidden" name="old1" value="1"> @endif <output id="list1" @if(!empty($photo1)) style="padding: 0px" @endif> @if(!empty($photo1)) <img id="img1" style="width:100%;height:11.5em;margin:0px;" class="thumb" src="{{ $photo1 }}" title="{{ $description1 }}"/> @endif </output> </label>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <textarea name="description1" class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment">@if(!empty($description1)) {{ $description1 }} @endif</textarea>
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
                                <input type="number" id="price1" name="price1" value="@if(isset($price1) AND !empty($price1)){{ $price1 }}@endif" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group text-right">
                            <div class="text-left">
                                <label class="textwhite">Por:</label>
                            </div>
                            <div class="text-left">
                                <select name="duration1" class="selectpicker form-control required">
                                    @foreach($durations as $durat)
                                        <option @if(!empty($selected_duration1) AND $selected_duration1 == $durat['type']) {{ 'selected' }} @endif value="{{ $durat['code'] }}">{{ $durat['type'] }}</option>
                                    @endforeach
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
                                <select name="currency1" class="selectpicker form-control required">
                                    @foreach($currencies as $curren)
                                        <option @if(!empty($selected_currency1) AND $selected_currency1 == $curren['currency_iso']) {{ 'selected' }} @endif value="{{ $curren['id'] }}">{{ $curren['currency_iso'] }}</option>
                                    @endforeach
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
                        <input class="fileinputs thumb file2" data-idFile="2" type="file" id="files2" name="file2" />
                        <label class="Giant text-center" for="files2" @if(!empty($photo2)) style="padding: 0px;" @endif>@if(empty($photo2))<span class="add">+</span> @else <input type="hidden" name="old2" value="1"> @endif <output id="list2" @if(!empty($photo2)) style="padding: 0px" @endif > @if(!empty($photo2)) <img id="img2" style="width:100%;height:11.5em;margin:0px;" class="thumb" src="{{ $photo2 }}" title="{{ $description2 }}"/> @endif </output></label>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <textarea name="description2" class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment">@if(!empty($description2)) {{ $description2 }} @endif</textarea>
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
                                <input type="number" name="price2" id="price2" value="@if(isset($price2) AND !empty($price2)){{ $price2 }}@endif" min="0.01" step="0.01" max="2500" class="form-control" placeholder="$"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group text-right">
                            <div class="text-left">
                                <label class="textwhite">Por:</label>
                            </div>
                            <div class="text-left">
                                <select name="duration2" class="selectpicker form-control required">
                                    @foreach($durations as $durat)
                                        <option @if(!empty($selected_duration2) AND $selected_duration2 == $durat['type']) {{ 'selected' }} @endif value="{{ $durat['code'] }}">{{ $durat['type'] }}</option>
                                    @endforeach
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
                                <select name="currency2" class="selectpicker form-control required">
                                    @foreach($currencies as $curren)
                                        <option @if(!empty($selected_currency2) AND $selected_currency2 == $curren['currency_iso']) {{ 'selected' }} @endif value="{{ $curren['id'] }}">{{ $curren['currency_iso'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alingRight" >
                <button type="submit" class="btn btnbar2 save-continue">Guardar y Continuar</button>
            </div>
        </div>
    </form>

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
                        a.html(img);
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