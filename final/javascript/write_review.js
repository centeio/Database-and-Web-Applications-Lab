$(document).ready(function(){
	// Check Radio-box
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
    	$(".rating span").removeClass('checked');
            $(this).parent().addClass('checked');
    }); 

	$('#writeReviewBtn').click(function() {
        $(".not-popup").css({ "filter": "blur(1px)", "-moz-filter": "blur(1px)", "-webkit-filter": "blur(1px)", "-o-filter": "blur(1px)"});
		$('#writeReview').modal("show");
	});
    
    $('#writeReview').on('hidden.bs.modal', function () {
        $('input[name=Choose]').attr('checked',false);
		$('#writeReviewComment').val('');
		$(".rating span").removeClass('checked');
    });
    
    $('#writeReview').on('hide.bs.modal', function () {
      $(".not-popup").css({ "filter": "blur(0px)", "-moz-filter": "blur(0px)", "-webkit-filter": "blur(0px)", "-o-filter": "blur(0px)"});
    });

	$('#submitButton').click(function() {
		$rating = $('#review-rating').val();
		$comment = $('#writeReviewComment').val();
		$productID = $('#productID').val();
		var $result;        

		$.ajax({
			type:"POST",
			url: "../../api/add_review.php",
			async: false,
			data: {
				rating: $rating ,
				comment: $comment,
				productID: $productID,
			},
			success: function(result) {
				$result = JSON.parse(result);
                $inserthtml = "	<hr>\
						<div class='row'>\
							<div class='col-md-12'>\
								<p class='pull-right'>" + 
                                    "<input name='rate' value=" + $rating + " class='rating-loading'>" + 
                                "</p>\
                                <p class='data'>" + $result['Date'] + "</p>\
                                <div class='rev'>\
                                    <p>Subscried by: <br></p>\
                                    <p class='username'>" + $result['FirstName'] + " " + $result['LastName'] + "</p>\
                                    <p class='descr'>" + $comment + "</p>\</div> </div> </div>";
				$("#ReviewsTitle").after($inserthtml);
				$('#writeReview').modal("hide");
                
                //Update stars
                $('.ratings').html("<p>\
                                    <input name=\"rate\" value=\"" + $result['averageRate'] + "\" class=\"rating-loading\" id=\"averageRate\">\
                                    ("+ $result['votes'] +")\
                                </p>");
                
                $('.rating-loading:not(#review-rating)').rating({displayOnly: true, size:'xs'});
                $('#review-rating').rating('update', 0);
			},
			error: function (xhr, ajaxOptions, thrownError) {
        			alert(xhr.status);
        			alert(thrownError);
      			}
		});
	});
});