$(document).ready(function() {
    $('.btn_plus').click(function() {
        changeQuantity((+$(this).prev("input").val() + 1), $(this));
    })

    $('.btn_less').click(function() {
        changeQuantity((+$(this).next("input").val() - 1), $(this));
    })

    $('#refresh').click(function() {
        location.reload();
    })

    $(".quantity").on('blur', function(e) {
        var qt = $(this).val();
        if (qt.match(/^0*[1-9][0-9]*$/) != null) {
            changeQuantity(qt, $(this));
        } else {
            changeQuantity("1", $(this));
        }
    })
})

function changeQuantity($quantity, $selector) {
    $quantity = parseInt($quantity);
    $product = $selector.parent().children(".quantity").attr("data-product");

    if ($quantity == 1) {
        $selector.parent().children(".btn_less").prop("disabled", true);
    } else {
        $selector.parent().children(".btn_less").prop("disabled", false);
    }

    $selector.parent().children("input").val($quantity);

    $.post("/~lbaw1611/final/api/change_to-go.php", { 'product': $product, 'quantity': $quantity }, function(data) {
        console.log($product + $quantity + $selector + data);
    }, 'json');
    /*   location.reload();*/
}

$('.btn_remove').click(function() {
    $product = $(this).attr("data-product");
    $.post("/~lbaw1611/final/api/delete_checkout.php", { 'product': $product }, function(data) {
        console.log(data);
    }, 'json');
    location.reload();
})