$(document).ready(function() {
    $(".remove").click(function() {
        var client_id = $(this).data("id");
        var action = "";
        if ($("tr[data-id='" + client_id + "']").attr('class') == "notRemoved"){
            action = "block";
        }
        else {
            action = "unblock";
        }
        $.ajax({
                method: "POST",
                url: "../../api/admin_clients.php",
                data: { 
                    client: client_id,
                    action: action
                 }
            })
            .done(function(data) {
                var result = jQuery.parseJSON(data).result;

                if (result == "desactivate") {
                    $("tr[data-id='" + client_id + "']").removeClass("notRemoved");
                    $("tr[data-id='" + client_id + "']").addClass("removed");
                }
                else if (result == "activate") {
                    $("tr[data-id='" + client_id + "']").removeClass("removed");
                    $("tr[data-id='" + client_id + "']").addClass("notRemoved");
                } else if (result == "exception") {
                    console.log("Exception");
                }
            })
            .fail(function() {
                console.log("Failed");
            });
    });
});