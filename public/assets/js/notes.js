/**
 * Created by andy on 30/05/2017.
 */


var CORE = AppCore();
//setiamos el formulario
var formNumberEmergicy = function (e) {
    e.preventDefault();
    var res,form;
    var elem = $("#formAddWithBadges");
    var name = elem.find("input.name");
    var number = elem.find("input.number");

    $.ajax({
        url:urlEmergicy,
        type:"POST",
        dataType:"json",
        data:{
            "phoneNumber":$(number).val(),
            "name":$(name).val()
        }
    }).done(function (res) {
        if(res.status ){

        }else{}
    }).fail(function (status) {
        console.log(status);
    });

};

$(document).ready(function () {
    $(".saveAdd").click(formNumberEmergicy);
});