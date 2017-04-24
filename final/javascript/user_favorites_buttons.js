
function addProductToShoppingBag($user, $product) {
    $.post("/~lbaw1611/proto/api/add_product_to_shopping_bag.php", {'user': $user, 'product': $product}, function(data) {
        console.log(data['result']);
    }, 'json');
}
function removeFavorite($user, $product) {    
    $.post("/~lbaw1611/proto/api/delete_favorite.php", {'user': $user, 'product': $product}, function(data) {
        console.log(data['result']);
    }, 'json');
    location.reload();
}