$(document).ready(function() {

    $("#signup").click(function(e) {
        e.preventDefault();
        var name = $("#new_name").val();
        var ps = $("#new_ps").val();
        $.post("./index.php", { query: val }, function(d) {
            if (d.length > 0) {
                $("#result").html(d);
            }
        })

    });

});