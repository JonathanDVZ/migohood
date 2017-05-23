@extends('layouts.master') @section('title', 'Photos') @section('class', 'contenedor') @section( 'content') @include('CreateSpace.navbar.navbar',['activo' => 'photos'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-3">
                    <br>
                    <div class="titulos">
                        <h3 class="titulo text-center">AGREGA FOTOS DE TU PROPIEDAD</h3>
                        <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <input class="fileinputs thumb file1" data-idFile="1" type="file" id="files1" name="files[]" />
                            <label class="Giant text-center" for="files1"><span class="add">+</span> <output id="list1"></output></label>
                            <!-- FALTA ARREGLAR EL HEIGHT Y WIDTH DE LA IMAGEN QUE SE MUESTRA -->

                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            <textarea class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <input class="fileinputs thumb file2" data-idFile="2" type="file" id="files2" name="files[]" />
                            <label class="Giant text-center" for="files2"><span class="add">+</span><output id="list2"></output></label>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            <textarea class="form-control textA" placeholder="Coloque un pie de pagina a esta foto" rows="5" id="comment"></textarea>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="Wbox">
                <p>Los lugares deben estar en la propiedad.</p>
                <br>
                <p>No incluya la lavanderias o lugares cercanos que no sean parte de de su propiedad. Si sus vecinos estan de acuerdo puede incluir piscinas, saunas o cualquier otro espacio compartido.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-space/listing')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-space/services')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
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
        //document.getElementById('files').addEventListener('change', archivo, false);
        var ActionEvent = function(vm){
            var  i =vm.parentNode;
            $(i).find("label.Giant").css("padding","0px");
            $(i).find("label.Giant output").css("padding","0px");
            i = $(i).find(".add").remove();
        };
        $(".file1").on("change",function(e){

            ActionEvent(this);
            archivo(e,this);
        });
        $(".file2").on("change",function(e){

            ActionEvent(this);
            archivo(e,this);
        });

    </script>
@endsection