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
        
        if($("#EditPrice").val() == "")
            return;
        
        if(isNaN($("#EditPrice").val()))
            return;
        
        if($("#EditStock").val() == "")
            return;
        
        if(isNaN($("#EditStock").val()))
            return;
        
        regex = /^[a-zA-Z0-9 .\-]+$/;
        
        if(!regex.test($("#EditDetails").val()))
            return;
        
        var selected = [];
        $('#NewCategories input:checked').each(function() {
            selected.push($(this).val());
        });
        
        $.ajax({
			type:"POST",
			url: "../../api/edit_product.php",
			async: false,
			data: {
				id: $("#productID").val(),
				name: $("#EditName").val(),
				price: $("#EditPrice").val(),
                stock: $("#EditStock").val(),
                details: $("#EditDetails").val(),
                newCategories: selected
			},
			success: function(result) {
				if(result)
                    location.reload();
			},
			error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
		});
    });
    
    $("#editImages div.already-added i").on("click", function() {
        $imageID = $(this).attr('id').substring($(this).attr('id').indexOf("image") + "image".length, $(this).attr('id').length);
        $element = $(this);
        
        $.ajax({
			type:"POST",
			url: "../../api/delete_image.php",
			async: false,
			data: {
				id: $imageID
			},
			success: function(result) {
				if(result) {
                    $element.parent("div").fadeOut(300,function() { $(this).remove(); });
                    
                    if($("#slideshow"+$imageID).hasClass("active")) {
                        $("#slideshow"+$imageID).removeClass("active");
                        $("#slideshow"+$imageID).next().addClass("active");
                    }
                    $("#indicator"+$imageID).remove();
                    $("#slideshow"+$imageID).remove();
                }
			},
			error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
		});
    });
    
    $("#newImage").on("change", function() {
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        var accepted = false;
        
        switch(ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
                accepted = true;
                break;
            default:
                alert('You can only choose images.');
                this.value='';
                break;
        }
        
        if(accepted) {
            var data = new FormData();
            
            data.append('productID', $("#productID").val());
            $.each($('#newImage')[0].files, function(i, file) {
                data.append('file-'+i, file);
            });
            
            $.ajax({
                type:"POST",
                url: "../../api/add_image.php",
                cache: false,
                contentType: false,
                processData: false,
                async: false,
                data: data,
                success: function(result) {
                    var resultParsed = JSON.parse(result);
                    alert(result.status);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    });
});