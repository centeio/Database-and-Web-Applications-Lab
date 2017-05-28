$(document).ready(function(){
    
    $("#reviewsContainer i").on("click", function() {
        $reviewID = $(this).attr('id');
        $productID = $('#productID').val();

		$.ajax({
			type:"POST",
			url: "../../api/delete_review.php",
			async: false,
			data: {
                productID: $productID,
				idreview: $reviewID
			},
			success: function(result) {
                $result = JSON.parse(result);
                
				if($result['deleted'])
                    $("#review"+$reviewID).fadeOut(300,function() { $("#review"+$reviewID).remove(); });
                
                //Update stars
                $('.ratings').html("<p>\
                                    <input name=\"rate\" value=\"" + $result['averageRate'] + "\" class=\"rating-loading\" id=\"averageRate\">\
                                    ("+ $result['votes'] +")\
                                </p>");
			},
			error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
		});
	});
});