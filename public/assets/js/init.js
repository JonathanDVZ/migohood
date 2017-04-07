$(document).ready(function() {
    // togle del boton de agregar mas en Hosting
    $("#show").click(function() {
        $("#Hidden").toggle(500);
    });

    // calendarios dentro del hosting
    $('#datetimepicker1').datetimepicker({ format: 'YYYY-MM-DD' });
    $('#datetimepicker2').datetimepicker({ format: 'YYYY-MM-DD' });
    $('#datetimepicker3').datetimepicker({
        inline: true,
        sideBySide: true,
        format: 'YYYY-MM-DD'
    });
    // tooltip de un span 
    $('[data-toggle="tooltip"]').tooltip();

    // mapa de Google junto con sus modificaciones



    // contador de texto de los texarea

    function textCounter(field, field2, maxlimit) {
        var countfield = document.getElementById(field2);
        if (field.value.length > maxlimit) {
            field.value = field.value.substring(0, maxlimit);
            return false;
        } else {
            countfield.value = maxlimit - field.value.length + " Caracters remaining ";
        }
    }

    /**
    *   Funciones para envio de formulario en
    *   creacion de espacios
    */
    $("#placeTypeNext").click(function(){
        $(this).attr('disabled','disabled');
        sendPlaceType();
        $(this).removeAttr('disabled');
    });

    function sendPlaceType(){
        var form = document.getElementById('formPlaceType');
        form.submit();
    }

    $("#addBedroomsNext").click(function(){
        $(this).attr('disabled','disabled');
        addBedrooms();
        $(this).removeAttr('disabled');
    });

    function addBedrooms(){
        var form = document.getElementById('formAddBedrooms');
        form.submit();
    }

})