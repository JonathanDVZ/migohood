var opcion = '';
var previous = '';


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
    // $('#datetimepicker3').datetimepicker({
    //     inline: true,
    //     sideBySide: true,
    //     format: 'YYYY-MM-DD',
    //     //multidate: true
    // });


    $('#calendar').fullCalendar({
      defaultView:'month',
      displayEventTime: false,
      editable: false,
      droppable: false,
      durationEditable: false,


      dayClick: function() {
        var valboolean;
        debugger;
        var moment = $('#calendar').fullCalendar('getDate');
        var date = $(this).data("date");
        //debugger;
        //console.log(date);
        valboolean = $(this).data('data-select');
        if (typeof valboolean == typeof undefined) {

          valboolean = 0;
          $(this).attr('data-select' , valboolean);
        }
        //debugger;


        valboolean=!valboolean;
        $(this).data('data-select', valboolean);
        data = {
          'service_id':$("[name='service_id']").val(),
          'date':date,
          'lock':valboolean
        };
        //console.log(valboolean);
        console.log(valboolean);
        console.log(data);
        if (valboolean) {

          $(this).css('background-color', 'red');
          $.ajax({
              url: 'save-service-day',
              data: data,
              type: 'POST',
              dataType: 'json',
              success: function(data) {
                  console.log(data);


              },
              error: function(jqXHR, textStatus, errorThrown) {

              }
          });
      }
      else if (!valboolean){

        $(this).css('background-color', '');
        $.ajax({
            url: 'update-service-day',
            data: data,
            type: 'PUT',
            dataType: 'json',
            success: function(data) {
                console.log(data);


            },
            error: function(jqXHR, textStatus, errorThrown) {


            }
          });
      }
    }

    });


    //$('#datetimepicker3').datepick({multiSelect: 30,dateFormat: 'dd-mm-yyyy',onSelect: showDate,minDate: '+1d'});
    //
    //
    // function showDate(date) {
    //     //console.log('The date chosen is ' + date);
    //     var fecha = $.datepick.formatDate($.datepick.parseDate('dd-mm-yyyy', date));
    //     alert(fecha);
    // }

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

                marker = new google.maps.Marker({
                    position:{lat: result[0].geometry.location.lat(),lng: result[0].geometry.location.lng() },
                    map:map,
                    cursor: 'default',
                    draggable: true
                });
                $('#longitude').val(result[0].geometry.location.lng());
                $('#latitude').val(result[0].geometry.location.lat());

                // Evento de captura para arrastre de marca
                google.maps.event.addListener(marker, 'dragend', function(evt){
                    console.log(evt.latLng.lat());
                    console.log(evt.latLng.lng());
                    $('#longitude').val(evt.latLng.lng());
                    $('#latitude').val(evt.latLng.lat());
                });

            });

            //setInterval(requestBusiness,1000);
        }
        // De no existir, se ubica en sitio por defecto
        else{


            if ($('#longitude').val() != '' && $('#longitude').val() != undefined && $('#latitude').val() != '' && $('#latitude').val() != undefined) {
                var lat = parseFloat($('#latitude').val());
                var lon = parseFloat($('#longitude').val());
                console.log(lat + ", " + lon );
                var mapProp = {
                    center: new google.maps.LatLng(lat, lon),
                    zoom: 15,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                marker = new google.maps.Marker({
                    position:{lat: lat, lng: lon },
                    map: map,
                    cursor: 'default',
                    draggable: true
                });
                google.maps.event.addListener(marker, 'dragend', function(evt){
                    console.log(evt.latLng.lat());
                    console.log(evt.latLng.lng());
                    $('#longitude').val(evt.latLng.lng());
                    $('#latitude').val(evt.latLng.lat());
                });

                /*
                listengForMark();*/
            } else {
                var mapProp = {
                center: new google.maps.LatLng(51.508742, -0.120850),
                zoom: 5,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
        }
    }

    function listengForMark(){

    }

    if ($('#googleMap').length > 0 ) {
        /*var map;
        var marker;*/
        //var marker;
        var marker;
        myMap();
        addressFill(true);
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

    $("#addHostingNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addHosting();
        $(this).removeAttr('disabled');
    });

    function addHosting() {
        var form = document.getElementById('formAddHosting');
        form.submit();
    }

    $("#addBasicsNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addBasics();
        $(this).removeAttr('disabled');
    });

    function addBasics() {
        var form = document.getElementById('formAddBasics');
        form.submit();
    }

    $("#addListingNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addListing();
        $(this).removeAttr('disabled');
    });

    function addListing() {
        var form = document.getElementById('formAddListing');
        form.submit();
    }

    $("#addPhotosNext").click(function() {
        $(this).attr('disabled', 'disabled');
        addPhotos();
        $(this).removeAttr('disabled');
    });

    function addPhotos() {
        var form = document.getElementById('formAddPhotos');
        form.submit();
    }


    /**
    * Funciones para manejar los select de location en creacion de espacios
    */

    function addressFill(no_mymap = false) {
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
        //alert(opcion);
        if (opcion == 'Selecciona un Pais') {
            opcion = '';
            //alert(opcion);
        }
        //console.log('Pais: ' + opcion);
        fullAddress += opcion;
        $("#selectedCountry").text(opcion);

        console.log(fullAddress);
        if (no_mymap) {

        } else {
            myMap(fullAddress);
        }

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
