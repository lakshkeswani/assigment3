$(document).ready(function() {

    var edit_password = JSON.parse(sessionStorage.getItem("edit_password"));

    $("#id").val(edit_password[0]);
    $("#title").val(edit_password[1]);
    $("#name").val(edit_password[2]);
    $("#password").val(edit_password[3]);
    $("#repeat").val(edit_password[3]);
    $("#url").val(edit_password[4]);


});