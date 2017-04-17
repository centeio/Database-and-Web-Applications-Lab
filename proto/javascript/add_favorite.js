$(document).ready(function() {

    $("#addfavorite").click(function() {
        var product_id = $("#product_id").attr("data");

        $.ajax({
                method: "POST",
                url: "add_favorite.php",
                data: { product: product_id },
                dataType: 'json'
            })
            .done(function(data) {
                alert(jQuery.parseJSON(data).result);
            })
            .fail(function() {
                alert("Não foi possível adicionar aos Favoritos.");
            });
    });
});