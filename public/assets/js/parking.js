/**
 * Created by andy on 16/05/2017.
 */
var zonetype="";
var dataType=function(e){
    zonetype=type=$(e).data('type');
};
var splet = function (){
    var type = document.querySelector(".selectpicker").value;
    var zone = zonetype;
    var quantity =  document.querySelector(".quantity").value;
    var step = window.location.href.split("/");
    var _token =document.querySelector("#_token").value;
    console.log(_token);

    if(zone !=undefined && type !=undefined && quantity !=undefined ){
        var req = $.ajax({
            url:"/create-parking/splet",
            type:"POST",
            dataType:"json",
            data:{
                "type":type,
                "zone":zonetype,
                "quantity":quantity,
                "step":step.pop(),
                "_token":_token
            }
        });
        req.done(function(data){

           if(data.success){
               window.location= data.route;
           } else{

           }
        });
        req.fail(function(error){    });

    }

};

var createItem = function(type,value,opt){
    var i,d,e,t;
    if(type == 'img'){
        e = document.createElement("div");
        i = document.createElement("img");
        i.setAttribute("src",url+"Icon-"+value+".png");
        i.style.width="100%";
        i.setAttribute("class","media-object");
        e.setAttribute("class" ,"media col-md-4 col-lg-4  col-sm-4 col-xs-4");
        e.append(i);
        i = e;
    }else{

        i = document.createElement("span");
        i.setAttribute("class" ,"media col-md-4 col-lg-4  col-sm-4 col-xs-4 find");
        i.setAttribute("data-leng",type);
        i.append(document.createTextNode(type+" camas más en existencia."));
        type="img";
    }
    d = document.createElement("div");
    d.setAttribute("class","content-"+type+" "+opt);
    d.append(i);
    return d;

};
var listItems=[];
var itemcount = 0;
var count=0;
var adicionImg = function(vm,dool) {

    var listIcon = [];
    listIcon['cama-de-agua'] = "Cama-Agua";
    listIcon['cama-individual'] = "Cama-Individual";
    listIcon['cama-matrimonial'] = "Cama-Matrimonio";
    listIcon['cama-doble'] = "Cama-Matrimonio";
    listIcon['litera'] = "Litera";
    listIcon['cuna'] = "Cuna";
    listIcon['colchon'] = "Cama-Colchon";
    listIcon['cama-de-ninos'] = "Cama-ninos";
    listIcon['sofa'] = "Sofa";
    listIcon['sofa-cama'] = "Sofa-Cama";
    listIcon['hamaca'] = "Hamaca";

    var e;
    var sl="";

    e = vm.value;
    sl = $(vm).data("type");

    var i = 1;
    var l=0;

    var conteElement = $(".contentImg");
    if($(".contentImg .content-img").length > 0){
        $(".contentImg .content-img").remove();
    }

    var lengthItem = conteElement[0].childElementCount;
    listItems[sl] = e;
    if(e != ""){
        itemcount = (parseInt(itemcount) + parseInt(e));
    }else if(e == "") {
        itemcount=0;
        for(var j in listItems){
            if(!isNaN(parseInt(listItems[j]))){
                itemcount = (parseInt(itemcount) + parseInt(lengthItem[j]));
            }
        }
    }

    var c=0;
    if(itemcount > 6){
        c = 6-count;
    }else{
        count = (parseInt(e)+parseInt(count));
    }
    console.log(listItems);
    var a=false;
    var b=0;

    for (var j in  listItems) {
        var e = listItems[j];
        if(itemcount >6) {

            for (var i = 1; i <= e; i++) {
                console.log(b);
                if(b < 5) {
                    b=b+1;
                    conteElement.append(createItem('img', listIcon[j], j));
                }else{
                    a=true;
                    l=l+1;
                }
            }
        }else{
            for (var i = 1; i <= e; i++) {
                    conteElement.append(createItem('img', listIcon[j], j));
            }
        }
    }
    if (a) {
        conteElement.append(createItem(l, listIcon[sl], sl));
    }

};
