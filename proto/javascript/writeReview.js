$(document).ready(function(){
	// Check Radio-box
        $(".rating input:radio").attr("checked", false);

        $('.rating input').click(function () {
        	$(".rating span").removeClass('checked');
                $(this).parent().addClass('checked');
        }); 

	$('#writeReviewBtn').click(function() {
		$('#writeReview').css("visibility", "visible");
		$('#writeReview').css("opacity", "1");
	});

	$('#cancelReview').click(function() {
		$('#writeReview').css("opacity", "0");
		$('#writeReview').css("visibility", "hidden");
	});

	$('#submitButton').click(function() {
		$rating = $('input[name=rating]:checked').val();
		$comment = $('#writeReviewComment').val();
		$productID = $('#productID').val();

		$.ajax({
			type:"POST",
			url: "../actions/writeReview.php",
			async: false,
			data: {
				rating: $rating ,
				comment: $comment,
				productID: $productID,
			},
			success: function(result) {
				alert('Successful');
			},
			error: function (xhr, ajaxOptions, thrownError) {
        			alert(xhr.status);
        			alert(thrownError);
      			}
		});
	});
});