function cancelOrder($order) {
    $.post("/~lbaw1611/final/api/cancel_order.php", { 'order': $order }, function(data) {
        console.log(data['result']);
        if (data['result'] == "success") {
            $("#state_order_" + $order).removeClass().addClass("canceled");
            $("#state_order_strong_" + $order).html("canceled");
            $("#panel_heading_order_" + $order).html("Order " + $order);
        }

    }, 'json');
}