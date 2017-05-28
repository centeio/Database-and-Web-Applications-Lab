$(document).ready(function(){
	$('#editProduct').click(function() {
        $(".not-popup").css({ "filter": "blur(1px)", "-moz-filter": "blur(1px)", "-webkit-filter": "blur(1px)", "-o-filter": "blur(1px)"});
		$('#editProductPopUp').modal("show");
	});
    
    $('#editProductPopUp').on('hidden.bs.modal', function () {
        $('input[name=Choose]').attr('checked',false);
		$('#writeReviewComment').val('');
		$(".rating span").removeClass('checked');
    });
    
    $('#editProductPopUp').on('hide.bs.modal', function () {
      $(".not-popup").css({ "filter": "blur(0px)", "-moz-filter": "blur(0px)", "-webkit-filter": "blur(0px)", "-o-filter": "blur(0px)"});
    });
    
    $("#SubmitEditProduct").on("click", function() {
        var regex = /^[a-zA-Z ]+$/;
        
        if(!regex.test($("#EditName").val()))
            return;
        
        regex = /[a-zA-Z]/;
        if(!regex.test($("#EditName").val()))
            return;
        
        alert($("#EditPrice").val());
        
        if(isNaN($("#EditPrice").val()))
            return;
        
        alert("Alo");
    });
});