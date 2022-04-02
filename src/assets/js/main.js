window.root_url = window.location.origin + "/zaFaksOSOSO/zafaksOSOSOS/src/";

$(document).ready(function () {

});

function login(){
    $.ajax({
        url: window.root_url + "?q=Alogin",
        type:"POST",
        data: $("form").serialize(), 
        success:function(h){
            alerts(h);
        }
    })
}


function alerts(msg){

    var idB = document.getElementById("msgBox");

    idB.classList.add("msgBox");
    idB.innerHTML = msg;
    setTimeout(() => {
   
        idB.setAttribute("style","opacity:0; ");
            setTimeout(() => {
                idB.classList.remove("msgBox");
                idB.innerHTML = "";
            }, 100);
    }, 5000);
     
}