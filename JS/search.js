$(document).ready(function() {

    $("#button").click(function(e) {
        e.preventDefault();
        var val1 = $("#query").val();
        var val2 = $("#search_type").val();
        $.post("./find.php", { query: val1, search_type: val2 }, function(d) {
            if (d.length > 0) {
                $("#results").html(d);
            }
        });
    });

});