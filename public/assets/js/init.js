var opcion = '';
var previous = '';

$(document).ready(function() {
    // togle del boton de agregar mas en Hosting
    $("#show").click(function() {
        $("#Hidden").toggle(500);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
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
    function myMap(address=null) {
        
        // Se comprueba si existe la dirección del request, ya que si existe debemos ubicarnos en la posición adecuada
        if ( address != '' && address != null ){
            console.log(address);
            var geoCoder = new google.maps.Geocoder(address);
            var request = {address:address};
            geoCoder.geocode(request, function(result, status){            
                geometry_request = new google.maps.LatLng(result[0].geometry.location.lat(), result[0].geometry.location.lng());

                map = new google.maps.Map(document.getElementById("googleMap"), {
                    center: {lat: result[0].geometry.location.lat(),lng: result[0].geometry.location.lng() },
                    scrollwheel: false,
                    zoom: 15
                });

                var marker = new google.maps.Marker({
                    position:{lat: result[0].geometry.location.lat(),lng: result[0].geometry.location.lng() },
                    map:map,
                    cursor: 'default',
                    draggable: false
                }); 

            });
            
            //setInterval(requestBusiness,1000);
        }
        // De no existir, se ubica en sitio por defecto
        else{
            var mapProp = {
            center: new google.maps.LatLng(51.508742, -0.120850),
            zoom: 5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
    }

    if ($('#googleMap').length > 0 ) {
        myMap();
        addressFill();
    }


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
    $("#placeTypeNext").click(function() {
        $(this).attr('disabled', 'disabled');
        sendPlaceType();
        $(this).removeAttr('disabled');
    });

    function sendPlaceType() {
        var form = document.getElementById('formPlaceType');
        form.submit();
    }

    $("#addBedroomsNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addBedrooms();
        $(this).removeAttr('disabled');
    });

    function addBedrooms() {
        var form = document.getElementById('formAddBedrooms');
        form.submit();
    }

    $(".addBed").click(function(){
        $(this).attr('disabled','disabled');
        addBed($(this).attr('id'));
        $(this).removeAttr('disabled');
    });

    function addBed(id){
        var form = document.getElementById('form'+id);
        form.submit();
    }

    $("#addBathsNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addBaths();
        $(this).removeAttr('disabled');
    });

    function addBaths() {
        var form = document.getElementById('formAddBaths');
        form.submit();
    }

    $("#addLocationNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addLocation();
        $(this).removeAttr('disabled');
    });

    function addLocation() {
        var form = document.getElementById('formAddLocation');
        form.submit();
    }

    $("#addAmenitiesNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addAmenities();
        $(this).removeAttr('disabled');
    });

    function addAmenities() {
        var form = document.getElementById('formAddAmenities');
        form.submit();
    }

    /**
    * Funciones NEXT y BACK
    */
    $("#nextToBathrooms").click(function() {
        $(this).attr('disabled', 'disabled');
        nextToBathrooms();
        $(this).removeAttr('disabled');
    });

    function nextToBathrooms() {
        var form = document.getElementById('formNextToBathrooms');
        form.submit();
    }

    $(".backToPlaceType").click(function() {
        $(this).attr('disabled', 'disabled');
        backToPlaceType();
        $(this).removeAttr('disabled');
    });

    function backToPlaceType() {
        var form = document.getElementById('formBackToPlaceType');
        form.submit();
    }

    $(".backToBedrooms").click(function() {
        $(this).attr('disabled', 'disabled');
        backToBedrooms();
        $(this).removeAttr('disabled');
    });

    function backToBedrooms() {
        var form = document.getElementById('formBackToBedrooms');
        form.submit();
    }

    $(".backToBathrooms").click(function() {
        $(this).attr('disabled', 'disabled');
        backToBathrooms();
        $(this).removeAttr('disabled');
    });

    function backToBathrooms() {
        var form = document.getElementById('formBackToBathrooms');
        form.submit();
    }

    $(".backToLocation").click(function() {
        $(this).attr('disabled', 'disabled');
        backToLocation();
        $(this).removeAttr('disabled');
    });

    function backToLocation() {
        var form = document.getElementById('formBackToLocation');
        form.submit();
    }

    $(".backToAmenities").click(function() {
        $(this).attr('disabled', 'disabled');
        backToAmenities();
        $(this).removeAttr('disabled');
    });

    function backToAmenities() {
        var form = document.getElementById('formBackToAmenities');
        form.submit();
    }


    /**
    * Funciones para manejar los select de location en creacion de espacios
    */

    function addressFill() {
        var fullAddress = '';

        opcion = $('#spaceAddress').val();
        
        previous = '';
        if ($('#spaceAddress').val() != '' && ($("#spaceCountry option:selected").val() != '' || $("#spaceState option:selected").text() != '' || $("#spaceCities option:selected").text() != '' || $("#selectedZipcode").text() != '')) {
            previous = ', ';
        }
        if (opcion == '') {
            opcion = '';
        }
        //console.log('Address: ' + opcion+ ' Previous: ' + previous);
        fullAddress += opcion + previous;
        $("#selectedAddress").text(opcion + previous);

        opcion = $('#spaceZipcode').val();
        
        previous = '';
        if ($('#spaceZipcode').val() != '' && ($("#spaceCountry option:selected").val() != '' || $("#spaceState option:selected").text() != '' || $("#spaceCities option:selected").text() != '')) {
            previous = ', ';
        }
        if (opcion == '') {
            opcion = '';
        }
        //console.log('Zipcode: ' + opcion+ ' Previous: ' + previous);
        fullAddress += opcion + previous;
        $("#selectedZipcode").text(opcion + previous);

        opcion = $("#spaceCities option:selected").text();
        
        previous = '';
        if (opcion != 'Seleccione una Ciudad' && opcion != '' && ($("#spaceCountry option:selected").val() != '' || $("#spaceState option:selected").text() != '')) {
            previous = ', ';
        }
        if (opcion == 'Seleccione una Ciudad') {
            opcion = '';
        }
        //console.log('City: ' + opcion+ ' Previous: ' + previous);
        fullAddress += opcion + previous;
        $("#selectedCity").text(opcion + previous);

        opcion = $("#spaceState option:selected").text();
        
        previous = '';
        if (opcion != 'Seleccione un Estado' && opcion != '' && ($("#spaceCountry option:selected").val() != '')) {
            previous = ', ';
        }
        if (opcion == 'Seleccione un Estado') {
            opcion = '';
        }
        //console.log('Estado: ' + opcion + ' Previous: ' + previous);
        fullAddress += opcion + previous;
        $("#selectedState").text(opcion + previous);


        opcion = $('#spaceCountry option:selected').text();
        //console.log('Pais: ' + opcion);
        fullAddress += opcion;
        $("#selectedCountry").text(opcion);

        console.log(fullAddress);
        myMap(fullAddress);
    }

    $("#spaceCountry").change(function() {
        var id = $(this).val();
        getStates(id);
    });

    function getStates(id) {
        if (id != '') {
            $.ajax({
                url: 'get-states',
                data: {id : id},
                type: 'POST',
                dataType: 'json',      
                success: function(data) {
                    console.log(data);
                    $("#resultCity").html('<select id="spaceCities" name="city" class="selectpicker form-control" required><option>Seleccione una Ciudad</option></select>');
                    $("#resultCity #spaceCities").selectpicker('refresh');

                    var content = '<select id="spaceState" name="state" class="selectpicker form-control" required>';
                    content += '<option>Seleccione un Estado</option>';
                    for (var i = data.length - 1; i >= 0; i--) {
                        content += '<option value="'+data[i]['id']+'">'+data[i]['state']+'</option>';
                    } 
                    content += '</select>';
                    $("#resultState").html(content);
                    $('#resultState #spaceState').selectpicker('refresh');
                    addressFill();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal('Locacion no encontrada! Intente de nuevo'); 
                }
            }); 
        }
    }

    $("#resultState").on("change","#spaceState",function() {
        var id = $(this).val();       
        getCities(id);
    });

    function getCities(id) {
        if (id != '') {
            $.ajax({
                url: 'get-cities',
                data: {id : id},
                type: 'POST',
                dataType: 'json',      
                success: function(data) {
                    console.log(data);
                    var content = '<select id="spaceCities" name="city" class="selectpicker form-control" required>';
                    content += '<option>Seleccione una Ciudad</option>';
                    for (var i = data.length - 1; i >= 0; i--) {
                        content += '<option value="'+data[i]['id']+'">'+data[i]['city']+'</option>';
                    } 
                    content += '</select>';
                    $("#resultCity").html(content);
                    $("#resultCity #spaceCities").selectpicker('refresh');
                    addressFill();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal('Locacion no encontrada! Intente de nuevo'); 
                }
            }); 
        }
    }

    $("#resultCity").on("change","#spaceCities",function() {
        addressFill();
    });

    $("#spaceZipcode").keyup(function(){
        addressFill();
    });

    $("#spaceAddress").keyup(function(){
        addressFill();
    });

})