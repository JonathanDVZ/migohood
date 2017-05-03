var searchMap;
var businessIds = new Array();
var route = "";
var dataBusiness = new Array();
var totalPrice_Request = 0;
var geometry_request;

var styles = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]}];

$(function () {  
 
    route = $('#prettyerProfile #thumbnail-business').attr('src');
})
 
function initMap(id){
 
    // Se comprueba si existe la dirección del request, ya que si existe debemos ubicarnos en la posición donde se efectuará el mismo.     
    if ( $("#request_address").length > 0 ){
        var geoCoder = new google.maps.Geocoder($("#request_address").val());
        var request = {address:$("#request_address").val()};
        geoCoder.geocode(request, function(result, status){            
            geometry_request = new google.maps.LatLng(result[0].geometry.location.lat(), result[0].geometry.location.lng());

            map = new google.maps.Map(document.getElementById(id), {
                center: {lat: result[0].geometry.location.lat(),lng: result[0].geometry.location.lng() },
                scrollwheel: false,
                zoom: 15
            });

            // Asignamos el estilo al mapa
            map.setOptions({styles: styles});
            searchMap = map;
        });
        
        setInterval(requestBusiness,1000);
    }
    // De no existir, se ubica por defecto en Manhattan
    else{
        map = new google.maps.Map(document.getElementById(id), {
            center: {lat: 40.7830603, lng: -73.97124880000001},
            scrollwheel: false,
            zoom: 12
        });

        // Asignamos el estilo al mapa
        map.setOptions({styles: styles});
    }
}

function addressMap(address,id,auxRuta,lat,long) {
    if (address != "") {
        /* Creo un mapa de tipo geocodificación, el cual recibe como parametro una dirección (como “1600 Amphitheatre Parkway, Mountain View, CA”) 
        y la convierte en coordenadas geográficas (como latitud 37,423021 y longitud -122,083739) */
        var geoCoder = new google.maps.Geocoder(address);

        /* Un nuevo objeto para la solicitud que llamamos "request", se pueden colocar otros parametros para especificar una
        mejor búsqueda (verificar la documentación oficial para más detalles). En esta ocación se agrega unicamente la dirección*/
        var request = {address:address};

        //Se realiza la solicitud
        geoCoder.geocode(request, function(result, status){
            /* Como resultado se obtienen dos parametros: result y status. El resultado "result" es un array que contiene
               el resultado de la busqueda, aquí se eligé sólo el primer resultado usando "result[0]", sin embargo
               se puede usar más de uno si se necesita. */

            /* Entonces, usando el primer resultado creamos un objeto latlng que contendrá la latitud y longitud de 
               nuestra busqueda */
            var latlng = new google.maps.LatLng(result[0].geometry.location.lat(), result[0].geometry.location.lng());  
     
            // Creamos los valores iniciales para nuestro mapa
            var myOptions = {
                zoom: 15,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
        
            // Ahora creamos el mapa con toda la información anterior
            var map = new google.maps.Map(document.getElementById(id),myOptions);

            // Asignamos el estilo al mapa
            map.setOptions({styles: styles});
     
            // Añadimos el marcador en nuestro mapa
            var marker = new google.maps.Marker({
                position:latlng,
                map:map,
                title:'Prettyer Mark',
                icon: auxRuta+'assets/img/mark.png',
                cursor: 'default',
                draggable: false
            }); 
        })
    } else if(lat != "" && long != ""){
        var myOptions = {
            zoom: 15,
            center: {lat: lat, lng: long},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        // Ahora creamos el mapa con toda la información anterior
        var map = new google.maps.Map(document.getElementById(id),myOptions);

        // Asignamos el estilo al mapa
        map.setOptions({styles: styles});
 
        // Añadimos el marcador en nuestro mapa
        var marker = new google.maps.Marker({
            position:{lat: lat, lng: long},
            map:map,
            title:'Prettyer Mark',
            icon: auxRuta+'assets/img/mark.png',
            cursor: 'default',
            draggable: false
        }); 
    }
    

}

function geocodeLatLng(lat,lng) {
  var latlng = {lat: lat, lng: lng};
  var geocoder = new google.maps.Geocoder;
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        //window.alert(results[1].formatted_address);
        //alert(results[1].formatted_address);
        $('#zip-code').val(results[1].formatted_address);
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}

function requestBusiness() {
    if ( $("#request_id").length > 0 ){
        $.ajax({
            // la URL para la petición
            url: 'getBusiness',
            // especifica si será una petición POST o GET
            type: 'get',
            // el tipo de información que se espera de respuesta
            dataType: 'json',   
            data: { request_id : $("#request_id").val() },
            before: function() {
            },     
            success: function(data) {
                $.each(data, function(index){
                    if(businessIds.indexOf(data[index].business.id)==-1)
                        businessMark(data[index]);                
                });
            },
            error:function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
}

function businessMark(data){ 

    /* Revisar cuando se le quiera dar diseño al popup: http://codepen.io/Marnoto/pen/xboPmG , http://en.marnoto.com/2014/09/5-formas-de-personalizar-infowindow.html */
    var popup = new google.maps.InfoWindow({
        content: '<a href="" class="prettyerProfileInfo" data-toggle="modal" data-target="#prettyerProfile">Click here to get more information about this business!</a>'
    });

    var geometry_business;
    var geoCoder = new google.maps.Geocoder(data.business.address);
    var request = {address:data.business.address};
    geoCoder.geocode(request, function(result, status){
        var latlng;
        try {
            geometry_business = new google.maps.LatLng(result[0].geometry.location.lat(), result[0].geometry.location.lng());
        }
        catch(err) {
        }   

        var distance = google.maps.geometry.spherical.computeDistanceBetween(geometry_business,geometry_request);  

         if (distance<=5000){

            // Añadimos el marcador en nuestro mapa
            var marker = new google.maps.Marker({
                position:geometry_business,
                map:searchMap,
                title:'Prettyer Mark',
                icon: 'assets/img/mark.png',
                cursor: 'default',
                draggable: false
            }); 

            google.maps.event.addListener(marker, 'click', function(){
                popup.open(searchMap, marker);
                modal();
            });  
        } 
    });       

    function modal() {        
        $('.prettyerProfileInfo').on('click', function() {
            setTimeout('initMap("prettyerProfile-map")',500);
            $('#prettyerProfile #name-business').html(data.business.name)
            $('#prettyerProfile .photo-profile').html('<img class="" id="thumbnail-business" src="'+data.business.thumbnail+'">');
            if(data.business.description!='' && data.business.description!=null)
                $('#prettyerProfile p.business-description').html(data.business.description);
            else
                $('#prettyerProfile p.business-description').html('Without description');
            dataBusiness = data;
        })

    }
    
    businessIds.push(data.business.id);
}

$('.services-modal').on('click',function(){
        setTimeout('$("#services-modal").modal("show")',500);
        var content = '';
        var subtotal = 0;
        $.each(dataBusiness.services, function(index,service){
            content += '<div class="col-xs-4 col-sm-4 col-sm-offset-2"><h3>'+service.name+'</h3></div><div class="col-xs-4 col-sm-3"><h3>$'+service.price+'</h3></div><div class="col-xs-4 col-sm-3 checkbox"><h3><input type="checkbox" name="" checked>&nbsp;</h3></div>';
            subtotal += service.price;
        });
        totalPrice_Request = subtotal;
        $('#services-modal .services-price').html(content);
        $('#services-modal h3.total_price').html('$'+totalPrice_Request+' USD');
});

$('.paymentmethods-modal').on('click',function(){
    setTimeout('$("#paymentmethods-modal").modal("show")',500);
    setTimeout('stripeFunction()',600);
    $('#paymentmethods-modal input#total_amount').val(totalPrice_Request);
    $('#paymentmethods-modal input#business_id').val(dataBusiness.business.id);
});