/**
 * Created by andy on 30/05/2017.
 */

var listEmergicy = [];
var CORE = AppCore();
var childTr=function (e,vm) {

    if(vm.id !=undefined){
        var tr = document.createElement("tr");
        var td = document.createElement("td");
        var td1= document.createElement("td");
        var td2 = document.createElement("td");
        td.append(document.createTextNode(vm.id));
        td1.append(document.createTextNode(vm.name));
        td2.append(document.createTextNode(vm.number));
        tr.append(td);
        tr.append(td1);
        tr.append(td2);
        $(e).append(tr);
    }
};
//setiamos el formulario
var formNumberEmergicy = function (e) {
    e.preventDefault();
    var res,form;
    var elem = $("#formAddWithBadges");
    var name = elem.find("input.name");
    var number = elem.find("input.number");

    elem = $("#contentTable");
    var elem1 = $("#contentTable2");

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
            listEmergicy.push(res.msj);
            childTr(elem,res.msj);
            childTr(elem1,res.msj);
            $("button.close").click();
            $(name).val("");
            $(number).val("");

        }else{}
    }).fail(function (status) {
        console.log(status);
    });



};

$(document).ready(function () {
    $(".saveAdd").click(formNumberEmergicy);
});