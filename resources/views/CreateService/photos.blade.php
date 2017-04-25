@extends('layouts.master') @section('title', 'Photos') @section('class', 'contenedor') @section( 'content') @include('CreateService.navbar.navbar',['activo' => 'photos'])
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
                            <input class="fileinputs thumb" type="file" id="files" name="files[]" />
                            <label class="Giant text-center" for="files">+ <output id="list"></output></label>
                            <!-- FALTA ARREGLAR EL HEIGHT Y WIDTH DE LA IMAGEN QUE SE MUESTRA -->
                            <script>
                                function archivo(evt) {
                                    var files = evt.target.files; // FileList object

                                    // Obtenemos la imagen del campo "file".
                                    for (var i = 0, f; f = files[i]; i++) {
                                        //Solo admitimos imágenes.
                                        if (!f.type.match('image.*')) {
                                            continue;
                                        }

                                        var reader = new FileReader();

                                        reader.onload = (function(theFile) {
                                            return function(e) {
                                                // Insertamos la imagen
                                                document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                                            };
                                        })(f);

                                        reader.readAsDataURL(f);
                                    }
                                }

                                document.getElementById('files').addEventListener('change', archivo, false);
                            </script>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            <textarea class="form-control textA" rows="5" placeholder="Coloque un pie de pagina a esta foto" id="comment"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <input class="fileinputs thumb" type="file" id="files" name="files[]" />
                            <label class="Giant text-center" for="files">+ <output id="list"></output></label>
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
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset1 col-xs-offset-1 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-service/basics')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a href="{{url('/create-service/location')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>

@endsection