$(document).ready(function() {
    $("#show").click(function() {
        $("#Hidden").toggle(500);
    });
    $('#datetimepicker1').datetimepicker({ format: 'YYYY-MM-DD' });
    $('#datetimepicker2').datetimepicker({ format: 'YYYY-MM-DD' });
    $('#datetimepicker3').datetimepicker({
        inline: true,
        sideBySide: true,
        format: 'YYYY-MM-DD'
    });
    $('[data-toggle="tooltip"]').tooltip();
});

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}