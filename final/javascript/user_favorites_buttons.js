function addProductToShoppingBag($user, $product) {
    $.post("/~lbaw1611/final/api/add_product_to_shopping_bag.php", { 'user': $user, 'product': $product }, function(data) {
        console.log(data['result']);
        if (data['result'] == "new" || data['result'] == "updated") {
            $("#myModal").modal("show");
        }

    }, 'json');
}

function removeFavorite($user, $product) {
    $.post("/~lbaw1611/final/api/delete_favorite.php", { 'user': $user, 'product': $product }, function(data) {
        console.log(data);
    }, 'json');
    location.reload();
}