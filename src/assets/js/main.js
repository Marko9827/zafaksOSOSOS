window.root_url = window.location.origin + "/zaFaksOSOSO/zafaksOSOSOS/src/";

$(document).ready(function () {

});

function logout() {
    $.ajax({
        url: window.root_url + "?q=logout",
        type: "GET",
        success: function (h) {
            if (parseInt(h) == 1) {
                window.location.reload();
            }
        }
    })
}

function login() {
    $.ajax({
        url: window.root_url + "?q=Alogin",
        type: "POST",
        data: $("form").serialize(),
        success: function (h) {
            if (parseInt(h) == 1) {
                window.location.reload();
            } else {
                alerts(h);
            }
        }
    });
}


function alerts(msg) {

    var idB = document.getElementById("msgBox");

    idB.classList.add("msgBox");
    idB.innerHTML = msg;
    setTimeout(() => {

        idB.setAttribute("style", "opacity:0; ");
        setTimeout(() => {
            idB.classList.remove("msgBox");
            idB.innerHTML = "";
        }, 100);
    }, 5000);

}

function prijaviIspit(id_studenta, ispit, brojPrijava, napomene, id_predmeta) {
    $.ajax({
        url: window.root_url + "?q=ispit_prijavi",
        type: "POST",
        data: {
            id_studenta: id_studenta,
            ispit: ispit,
            brojPrijava: brojPrijava,
            napomene: napomene,
            id_predmeta: id_predmeta
        },
        success: function (h) {
            if (parseInt(h) == 1) {
                window.location.reload();
            } else {
                alert(h);
            }
        }
    });
}

function change(e){
    
}
