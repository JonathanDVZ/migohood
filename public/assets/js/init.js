$(document).ready(function(){
    $("#show").click(function(){
        $("#Hidden").show(3000);
    });
    $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD'});
    $('#datetimepicker2').datetimepicker({format: 'YYYY-MM-DD'});
});