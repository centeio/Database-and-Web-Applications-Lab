$(document).ready(function() {
    $("#addfavorite").click(function() {
        var product_id = $("#product_id").attr("data");

        console.log("Product ID " + product_id);

        $.ajax({
                method: "POST",
                url: "../../api/add_favorite.php",
                data: { product: product_id }
            })
            .done(function(data) {
                console.log("done " + data);
                var result = jQuery.parseJSON(data).result;

                if (result == "duplicate") {
                    $('#heart').removeClass("fa-heart").addClass("fa-heart-o");
                } else if (result == "new") {
                    $('#heart').removeClass("fa-heart-o").addClass("fa-heart");
                }
            })
            .fail(function() {
                console.log("failed");
            });
    });
});