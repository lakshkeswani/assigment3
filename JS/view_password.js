$(document).ready(function() {

    $("tr").dblclick(function(e) {
        e.preventDefault();
        var row = e.currentTarget;
        sessionStorage.setItem("edit_password", JSON.stringify([
            row.childNodes[0].innerHTML,
            row.childNodes[1].innerHTML,
            row.childNodes[2].innerHTML,
            row.childNodes[3].innerHTML,
            row.childNodes[4].innerHTML
        ]));





        window.location.href = "./edit.php";

    });

});