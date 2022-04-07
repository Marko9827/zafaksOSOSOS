window.root_url = window.location.origin + "/zaFaksOSOSO/zafaksOSOSOS/src/";

$(document).ready(function () {

});

function logout() {
    questin("Sigurni ste da želite da se odjavite?", function () {
        $.ajax({
            url: window.root_url + "?q=logout",
            type: "GET",
            success: function (h) {
                if (parseInt(h) == 1) {
                    window.location.reload();
                }
            }
        });
    });
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

function changeH(event) {
    var administracija_img_file = document.getElementById("administracija_img"),
        file = $("#administracija_img_file").get(0).files[0];

    if (file) {

        var reader = new FileReader();

        reader.onload = function (eh) {
            var src = eh.target.result;
            administracija_img_file.src = src;
        }

        reader.readAsDataURL(file);
    }


}

function questin(msg, callback) {
    var answer = window.confirm(msg);
    if (answer) {
        callback();

    }
    else {
        //some code
    }

}

function administracijaSAVE() {
    $.ajax({
        url: window.root_url + "?q=administracija",
        type: "POST",
        data: $("#administracija_form_ha").serialize(),
        success: function (v) {
            if (parseInt(v) == 1) {
                window.location.reload();
            } else {
                alert("Nije uspelo. Pokušajte ponovo!");
            }
        }
    })
}


function sumbitbtn() {

    var fd = new FormData();
    var files = $('#administracija_img_file')[0].files;
    if (files.length > 0) {
        for (i = 0; i < files.length; i++) {
            data.append('file' + i, files[i]);
        }

        $.ajax({
            url: window.root_url + "?q=uploader",
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    administracijaSAVE();
                }
            },
        });
    } else {
        administracijaSAVE();
    }
};


