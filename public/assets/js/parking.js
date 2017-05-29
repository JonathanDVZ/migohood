/**
 * Created by andy on 16/05/2017.
 */
var AppCore=function(){
  return{
      url:"",
      type:"",
      data:"",
      ajax:function(){
         var e= $.ajax({
              url:url,
              type:type,
              data:data
          });
         return e;
      },
      creatElementApend:function (type,opt,val) {
          var e;
        if(type=="button"){
            e=document.createElement("button");

            if(opt=="minus"){
                e.setAttribute("class","btn btn-default btn-number");
                e.setAttribute("type","button");
                //e.setAttribute("disabled","disabled");
                e.setAttribute("data-type","minus");
                e.setAttribute("data-field",val);
            }
            if(opt=="plus"){
                e.setAttribute("class","btn btn-default btn-number");
                e.setAttribute("type","button");
                e.setAttribute("data-type","plus");
                e.setAttribute("data-field",val);
            }
            e.addEventListener("click",button,true);
        }else if(type=="span"){

            e = document.createElement("span");
            e.setAttribute("class",opt);
        }else if(type=="input"){
            e=document.createElement("input");
            e.setAttribute('type',"number");
            e.setAttribute("class","form-control");
            e.setAttribute("required", "required");
            e.setAttribute("min", "1");
            e.setAttribute("max", "10");
            e.setAttribute("name", val);
            e.setAttribute("value", 1);
            e.setAttribute("data-type",val);
            e.setAttribute("placeholder", opt);
        }


        return e;

      }
  };
};
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
    var i,d,e,t,s,s1,s2,b,b2;
    if(type == 'input'){
        var pl="";
        var core = AppCore();
        t = value.split("-");
        for(var j=0;j<= t.length -1 ; j++){
             pl = pl+" "+t[j];
        }
        var btnName= pl.split(" ");
        btnName= btnName[btnName.length-1];

        e = document.createElement("div");
        s1=core.creatElementApend("span","glyphicon glyphicon-minus");
        s=core.creatElementApend("span","input-group-btn");
        var se=core.creatElementApend("span","input-group-btn span-plus");
        b=core.creatElementApend("button","minus",btnName);
        b.append(s1);
        s.append(b);
        i = core.creatElementApend("input",pl,btnName);
        s2= core.creatElementApend("span","glyphicon glyphicon-plus");
        b2=core.creatElementApend("button","plus",btnName);
        b2.append(s2);
        se.append(b2);

         //i.setAttribute(, value);
        i.addEventListener("change",adicionImg,true);
        e.setAttribute("class","form-group caja");
        //e.eve
        e.appendChild(s);
        e.appendChild(i);
        e.appendChild(se);
        i=e;
    }else if(type == 'img'){
        e = document.createElement("div");
        i = document.createElement("img");
        i.setAttribute("src",url+"/Icon-"+value+".png");
        i.style.width="50%";
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
    d.setAttribute("class","input-group");
    d.setAttribute("class","content-"+type+" "+opt);
    d.append(i);
    return d;

};

var loadItems=function () {
  'use strict';
  var conteElement = $(".contentImg");
  var e = $("input[type=number]");
  for(var i in e){

      var vm= (e[i]);
      var value = vm.value;
      if(value){
          adicionImg(vm,true);
      }
  }
};

var listItems=[];
var itemcount = 0;
var count=0;
var adicionImg = function(vm,dool) {

    var listIcon = [];
    listIcon['queen'] = "Cama-Agua";
    listIcon['individual'] = "Cama-Individual";
    listIcon['matrimonial'] = "Cama-Matrimonio";
    listIcon['doble'] = "Cama-Matrimonio";
    listIcon['litera'] = "Litera";
    listIcon['cuna'] = "Cuna";
    listIcon['colchon'] = "Cama-Colchon";
    listIcon['ninos'] = "Cama-ninos";
    listIcon['sofa'] = "Sofa";
    listIcon['cama'] = "Sofa-Cama";
    listIcon['hamaca'] = "Hamaca";

    var e;
    var sl="";
    e = $(vm).val();
    sl = $(vm).data("type");
debugger;
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
                itemcount = (parseInt(itemcount) + parseInt(listItems[j]));
            }
        }
    }

    var c=0;
    if(itemcount > 6){
        c = 6-count;
    }else{
        count = (parseInt(e)+parseInt(count));
    }

    var a=false;
    var b=0;

    for (var j in  listItems) {
        var e = listItems[j];
        if(itemcount >6) {

            for (var i = 1; i <= e; i++) {

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

// evento click de buttom +/-
var button=function(e){
    e.preventDefault();

    var fieldName = $(this).attr('data-field');
    var type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {

            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
                adicionImg(input,false);
            }
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
                adicionImg(input,false);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                adicionImg(input,false);
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
                adicionImg(input,false);

            }

        }
    } else {
        input.val(0);
    }
};
