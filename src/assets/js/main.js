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

function prijaviIspit(id_predmeta) {
    $.ajax({
        url: window.root_url + "?q=ispit_prijavi",
        type: "POST",
        data:{
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

function odjaviIspit(id){
    questin("Sigurni ste da želite da odjavite ispit? Naravno možete ga prijaviti u sledećem roku.",function(){
        $.ajax({
            url: window.root_url + "?q=ispitRemove",
            type:"POST", 
            data:{
                id_predmeta:id
            },
            success:function(v){
                if(parseInt(v) == 1){
                    window.location.reload();
                }
            }
        });
    });
}

function dodaj_pare(){
    $.get("./?q=moneyAdd",function(){
        window.location.reload();
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

function notifikacije() {

}

function red(what) {
    window.location.href = "./?p=" + what;
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
        data: {
            username: $("#username").val(),
            datumRodjenja: $("#datumRodjenja").val(),
            upisao: $("#upisao").val()
        },
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
    questin("Da li ste sigurni da želite da sačuvate izmene?", function () {
        var fd = new FormData();
        var files = $('#administracija_img_file')[0].files;
        if (files.length > 0) {
            for (i = 0; i < files.length; i++) {
                fd.append('file' + i, files[i]);
            }

            $.ajax({
                url: window.root_url + "?q=uploader",
                cache: false,
                dataType: "text",
                data: fd,
                contentType: false,
                processData: false,
                type: "post",
                success: function (response) {

                    administracijaSAVE();

                },
            });
        } else {
            administracijaSAVE();
        }
    });
};


